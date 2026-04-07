<?php

namespace App\Http\Controllers;

//Default
use Illuminate\Http\Request;

//Login
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

//Register
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\Admin;

//Count users
use App\Models\User;
use App\Models\Frontdesk;
use App\Models\BeaneryUser;
use App\Models\Manage_Room;
use Illuminate\Support\Facades\DB;

//Change Password
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    //Display the login view.
    public function Index(){

        return view('admin.admin_login');
    }

    //Display the dashboard view.
    public function Dashboard(){
        $totalAdmin = DB::table('admins')->where('is_super', 0)->count();
        $totalNewAdmin = DB::table('admins')->where('is_super', 0)->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->count();
        $totalGuest = DB::table('users')->count();
        $totalNewGuest = DB::table('users')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->count();
        $totalFrontdesk = DB::table('frontdesks')->count();
        $totalNewFrontdesk = DB::table('frontdesks')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->count();
        $totalCashier = DB::table('beanery_users')->where('usertype', 'cashier')->count();
        $totalNewCashier = DB::table('beanery_users')->where('usertype', 'cashier')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->count();
        $totalStockController = DB::table('beanery_users')->where('usertype', 'stockcontroller')->count();
        $totalNewStockController = DB::table('beanery_users')->where('usertype', 'stockcontroller')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->count();
        $totalRoom = DB::table('manage_rooms')->count();
        $inventorystocks = DB::table('inventory')->whereRaw('total_stock < minimum_stock')->get();
        $expiredreservationcount = DB::table('reservations')->where('booking_status', 'Pending')->whereRaw('DATEDIFF(CURDATE(), expired_date) > 1')->count();
        $overallSales = DB::table('order_header')->selectRaw('SUM(total_amount) as grandtotal')->whereIn('order_status', ["prepared", "paid"])->first();
        $overallBooking = DB::table('reservations')->selectRaw('count(id) as completedreservation')->whereIn('booking_status', ["Completed"])->first();


        // DYAT
        $totalKitchen = DB::table('beanery_users')->where('usertype', 'kitchen')->count();
        $totalNewKitchen = DB::table('beanery_users')->where('usertype', 'kitchen')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->count();
        //DYAT

    // return view('admin.admin_dashboard', compact('totalGuest', 'totalFrontdesk', 'totalStockController', 'totalCashier', 'totalRoom','totalAdmin', 'totalNewAdmin', 'totalNewGuest', 'totalNewFrontdesk', 'totalNewStockController', 'totalNewCashier', 'inventorystocks', 'expiredreservationcount', 'overallSales', 'overallBooking'));

        

        return view('admin.admin_dashboard', compact('totalGuest', 'totalFrontdesk', 'totalStockController', 'totalCashier','totalKitchen', 'totalRoom','totalAdmin', 'totalNewAdmin', 'totalNewGuest', 'totalNewFrontdesk', 'totalNewStockController', 'totalNewKitchen','totalNewCashier', 'inventorystocks', 'expiredreservationcount', 'overallSales', 'overallBooking'));
    }

    // public function Login(Request $request){
    //     // dd($request->all());

    //     $check = $request->all();
    //     if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])){
    //         return redirect()->route('admin.dashboard')->with('error', 'Admin login successfully');
    //     }
    //     else{
    //         return back();
    //     }
    // }

    //Handle an incoming login request.
    public function Login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate_Admin();

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    //Destroy an authenticated session or Logout.
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login_form');
        // return redirect('/admin/login');
    }

    //Display the registration view.
    public function AdminRegister(){
        return view('admin.admin_register');
    }

    /*
    //Handle an incoming registration request.
    public function AdminRegisterCreate(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', 
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($admin));
        return redirect()->route('admin.adminList')->with('registered', 'Admin account is successfully registered.');
        // return redirect('/admin/login');
    }
    */


    public function AdminRegisterCreate(Request $request): RedirectResponse {

    //dd($request->all());

    $request->validate([
        'name' => ['required','string','max:255'],
        'email' => ['required','string','max:255','unique:admins,email'],
        'password' => ['required','confirmed',
            Password::min(8)->letters()->numbers()->mixedCase()->symbols()
        ],
    ]);

    $admin = Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'Acc_Stat' => 'Active'
    ]);

   

    return redirect()->route('admin.adminList')
        ->with('registered','Admin account is successfully registered.');
}

    //Handle an incoming registration request.
    public function AdminRegisterUpdate(Request $request, $id): RedirectResponse {
        if($request->accounttype == "admin"){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string',  'max:255'],
            ]);

            $admin = Admin::findOrFail($id);
        } else if($request->accounttype == "frontdesk") {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string',  'max:255'],
            ]);
            
            $admin = Frontdesk::findOrFail($id);
        } else if($request->accounttype == "cashier") {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
            ]);
            
            $admin = BeaneryUser::findOrFail($id);
        } else if($request->accounttype == "stockcontroller") {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
            ]);
            
            $admin = BeaneryUser::findOrFail($id);
        }
        
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password != ""){
            if($request->accounttype == "frontdesk" || $request->accounttype == "admin"){
                $admin->password = Hash::make($request->password);
            } else {
                $admin->password = md5(base64_encode(md5($request->password)));
            }
        }
        $admin->save();

        return redirect()->route('admin.'.$request->accounttype.'List')->with('registered', ucwords($request->accounttype).' account is successfully updated.');
        // return redirect('/admin/login');
    }

    // Display Change Password view
    // public function showChangePasswordForm(){
    //     return view('admin.admin_changePassword');
    // }
    public function showChangePasswordForm(Request $request): View
    {
        return view('admin.admin_changePassword', ['request' => $request]);
    }

    public function updateRoom(Request $request){
        echo "d2"; exit;
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    // View List of Admin Users
    public function AdminList(){
        $admins = Admin::all()->where('is_super', 0);
        return view('admin.admin_view-admin-users', ['admins' => $admins]);
    }
    public function AdminNewList(){
        $admins = DB::table('admins')->where('is_super', 0)->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->get();
        return view('admin.admin_view-new-admin-users', ['admins' => $admins]);
    }

    // View List of guest users
    public function GuestList(){
        $users = User::all();
        return view('admin.admin_view-guest-users', ['users' => $users]);
    }
    public function GuestNewList(){
        $users = DB::table('users')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->get();
        return view('admin.admin_view-new-guest-users', ['users' => $users]);
    }

    // View List of Frontdesk Users
    public function FrontdeskList(){
        $frontdesks = Frontdesk::all();
        return view('admin.admin_view-frontdesk-users', ['frontdesks' => $frontdesks]);
    }

    public function FrontdeskNewList(){
        $frontdesks = DB::table('frontdesks')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->get();
        return view('admin.admin_view-new-frontdesk-users', ['frontdesks' => $frontdesks]);
    }

    // View List of Cashier Users
    public function cashierList(){
        $cashiers = BeaneryUser::where('usertype', 'cashier')->get();
        return view('admin.admin_view-cashier-users', ['cashiers' => $cashiers]);
    }

    public function cashierNewList(){
        $cashiers = DB::table('beanery_users')->where('usertype', 'cashier')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->get();
        return view('admin.admin_view-new-cashier-users', ['cashiers' => $cashiers]);
    }



    // DYAT

    public function kitchenList(){
        $kitchens = BeaneryUser::where('usertype', 'kitchen')->get();
        return view('admin.admin_view-kitchen-users', ['kitchens' => $kitchens]);
    }

    public function kitchenNewList(){
        $kitchens = DB::table('beanery_users')->where('usertype', 'kitchen')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->get();
        return view('admin.admin_view-new-kitchen-users', ['kitchens' => $kitchens]);
    }

    // DYAT

    // View List of Stock Controller Users
    public function stockControllerList(){
        $stockcontrollers = BeaneryUser::where('usertype', 'stockcontroller')->get();
        return view('admin.admin_view-stockcontroller-users', ['stockcontrollers' => $stockcontrollers]);
    }
    
    public function stockControllerNewList(){
        $stockcontrollers = DB::table('beanery_users')->where('usertype', 'stockcontroller')->whereRaw('DATEDIFF(CURDATE(), created_at) <= 2')->get();
        return view('admin.admin_view-new-stockcontroller-users', ['stockcontrollers' => $stockcontrollers]);
    }

    // View List of Rooms
    public function Rooms(){
        $rooms = Manage_Room::all();
        $roomtypes = DB::table('room_types')->get();

        return view('admin.admin_manage-rooms', ['rooms' => $rooms, 'roomtypes' => $roomtypes]);
    }
   
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:'.Frontdesk::class],
            'password' => ['required', 'confirmed'],
        ]);
        $requestData = $request->all();
        $fileName = time().$request->file('photos')->getClientOriginalName();
        Manage_Room::create($requestData);
        return redirect()->route('admin.frontdesk-List.index')->with('success', 'The record has been successfully added.');
    }

    public function inactive($id)
    {
        $user = User::findOrFail($id);
        $user->Acc_Stat = 'Inactive';
        $user->save();
        return redirect()->back()->with('success', 'User deactivated successfully!');
    }
    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->Acc_Stat = 'Active';
        $user->save();
        return redirect()->back()->with('success', 'User activated successfully!');
    }

    public function inactiveAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->Acc_Stat = 'Inactive';
        $admin->save();
        return redirect()->back()->with('success', 'Admin deactivated successfully!');
        
    }

    public function activeAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->Acc_Stat = 'Active';
        $admin->save();
        return redirect()->back()->with('success', 'Admin activated successfully!');
    }
    
    public function MenuDashboard(){
        $getfirstcategory = DB::table('menu_categories')->where('active', 1)->first();

        $menu = DB::table('menu')->where('category_id', $getfirstcategory->id)->where('active', 1)->get();
        $categories = DB::table('menu_categories')->where('active', 1)->get();

        return view('admin.admin_menu', ['menu' => $menu, 'categories' => $categories, 'cur_category' => $getfirstcategory]);
    }

    public function Menu($id){
        $menu = DB::table('menu')->where('category_id', $id)->where('active', 1)->get();
        $categories = DB::table('menu_categories')->where('active', 1)->get();
        $getfirstcategory = DB::table('menu_categories')->where('id', $id)->where('active', 1)->first();

        return view('admin.admin_menu', ['menu' => $menu, 'categories' => $categories, 'cur_category' => $getfirstcategory]);
    }
    
    public function MenuItemStore(Request $request){
        $validatedData = $request->validate([
            'menu_name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,max:2048',
        ]);


        if($request->hasfile('photos')){
            $file = $request->file('photos');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/menu/', $filename);
        } else {
            $filename = null;
        }
        
        DB::table('menu')->insert(
            [
                'menu_name' => $request->input('menu_name'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'image' => $filename
            ]
        );

        return redirect('admin/menu-list/'.$request->input('category_id'))->with('success', 'The menu has been successfully added.');
    }

    public function MenuItemUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'menu_name' => 'required',
            'price' => 'required|numeric',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,max:2048',
        ]);

        if($request->input('active')){
            $isactive = 1;
        } else {
            $isactive = 0;
        }
        
        DB::table('menu')
                ->where('id', $id)
                ->update(
                    [
                        'menu_name' => $request->input('menu_name'),
                        'price' => $request->input('price'),
                        'active' => $isactive,
                    ]
                );

        if($request->hasfile('photos')){
            $file = $request->file('photos');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/menu/', $filename);

            
        
            DB::table('menu')
            ->where('id', $id)
            ->update(
                [
                    'image' => $filename
                ]
            );
        }

        return redirect('admin/menu-list/'.$request->input('category_id'))->with('success', 'The menu has been successfully updated.');
    }

    public function DashboardUpdate(){
        $content = DB::table('dashboard_content')->where('id', 1)->first();

        return view('admin.admin_manage-dashboard')->with('content', $content);
    }

    public function DashboardExecUpdate(Request $request, $id){
        $validatedData = $request->validate([
            'contents' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif,max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg,gif,max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg,gif,max:2048',
            'image4' => 'image|mimes:jpeg,png,jpg,gif,max:2048',
        ]);
        
        DB::table('dashboard_content')
                ->where('id', $id)
                ->update(
                    [
                        'contents' => $request->input('contents')
                    ]
                );

        for($i=1; $i<=4; $i++){
            if($request->hasfile('image'.$i)){
                $file = $request->file('image'.$i);
                $extension = $file->getClientOriginalExtension(); //getting image extension
                $filename = time() . $i.'.' . $extension;
                $file->move('uploads/dashboard/', $filename);
    
                
            
                DB::table('dashboard_content')
                ->where('id', $id)
                ->update(
                    [
                        'image'.$i => $filename
                    ]
                );
            }
        }

        return redirect('admin/manage-dashboard')->with('success', 'Dashboard has been successfully updated.');
    }

    public function cancelExpiredReservation(){
        $expiredreservationcount = DB::table('reservations')->where('booking_status', 'Pending')->whereRaw('DATEDIFF(CURDATE(), expired_date) > 1')->update(['booking_status' => 'Cancelled', 'deleted_at' => date('Y-m-d H:i:s')]);

        return redirect('admin/dashboard')->with('success', 'Removed expired booking successful.');
    }

    public function RoomTypesIndex(){
        $roomtypes = DB::table('room_types')->get();

        return view('admin.admin_view-roomtypes', ['roomtypes' => $roomtypes]);
    }

    public function deleteRoomType($id)
    {
        $roomtypes = DB::table('room_types')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Room type deleted successfully!');
    }
    

    public function createRoomType(Request $request)
    {
        DB::table('room_types')->insert(
            [
                'name' => $request->input('name')
            ]
        );

        return redirect('admin/roomtypes')->with('success', 'The room type has been successfully added.');
    }

    public function MenuCategoriesIndex(){
        $categories = DB::table('menu_categories')->where('active', 1)->get();

        return view('admin.admin_view-menucategories', ['categories' => $categories]);
    }
    
    public function createMenuCategories(Request $request)
    {
        DB::table('menu_categories')->insert(
            [
                'category_name' => $request->input('name')
            ]
        );

        return redirect('admin/menu-dashboard')->with('success', 'The menu category has been successfully added.');
    }

    public function deleteMenuCategories($id)
    {
        $roomtypes = DB::table('menu_categories')->where('id', $id)->update(['active' => 0]);

        return redirect()->back()->with('success', 'Menu Category deleted successfully!');
    }

// DYAT

    public function updateMenuCategories(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('menu_categories') // <-- adjust table name if different
            ->where('id', $id)
            ->update([
                'category_name' => $request->name
            ]);

        return redirect()->back()->with('success', 'Category updated successfully!');
    }


// DYAT

    public function DashboardGuestFeedback(){
        $feedbacks = DB::table('guest_feedback')->get();

        return view('admin.admin_view-guestfeedback', ['feedbacks' => $feedbacks]);
    }

    public function FaqMaintenance(){
        $faqs = DB::table('faq')->get();

        return view('admin.admin_manage-faq')->with('faqs', $faqs);
    }

    public function deleteFaq($id)
    {
        $faq = DB::table('faq')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }
    

    public function createFaq(Request $request)
    {
        DB::table('faq')->insert(
            [
                'question' => $request->input('question'),
                'answer' => $request->input('answer')
            ]
        );

        return redirect('admin/manage-faq')->with('success', 'FAQ has been successfully added.');
    }

    public function updateFaq(Request $request, $id)
    {
        DB::table('faq')
                ->where('id', $id)
                ->update(
                    [
                        'question' => $request->input('question'),
                        'answer' => $request->input('answer'),
                    ]
                );
                
        return redirect('admin/manage-faq')->with('success', 'FAQ has been successfully added.');
    }

}
