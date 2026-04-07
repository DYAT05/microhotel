<?php

namespace App\Http\Controllers\Guest;
use DateTime;

use Carbon\Carbon;
use App\Models\Manage_Room;
use App\Models\ManageOrder;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuestOrderController extends Controller
{
    
    public function GuestMenuDashboard(){
        $getfirstcategory = DB::table('menu_categories')->where('active', 1)->first();

        $menu = DB::table('menu')->where('category_id', $getfirstcategory->id)->where('active', 1)->get();
        $categories = DB::table('menu_categories')->where('active', 1)->get();

        return view('userGuest.guest_order', ['menu' => $menu, 'categories' => $categories, 'cur_category' => $getfirstcategory]);
    }

    public function GuestMenu($id){
        $menu = DB::table('menu')->where('category_id', $id)->where('active', 1)->get();
        $categories = DB::table('menu_categories')->where('active', 1)->get();
        $getfirstcategory = DB::table('menu_categories')->where('id', $id)->where('active', 1)->first();

        return view('userGuest.guest_order', ['menu' => $menu, 'categories' => $categories, 'cur_category' => $getfirstcategory]);
    }
        
    public function GuestAddToCart(Request $request){
        
        $validatedData = $request->validate([
            'category_id' => 'required|numeric',
            'menu_id' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        DB::table('cart')->updateOrInsert(
            [
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
                'menu_id' => $request->input('menu_id'),
                'status' => 'added',
            ],
            [
                'quantity' => DB::raw("IF(ISNULL(quantity + ".$request->input('quantity')."),".$request->input('quantity').",quantity+".$request->input('quantity').")"),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect('userGuest/order/'.$request->input('category_id'))->with('success', 'Successfully added to cart.');
    }

    public function GuestCartList(){
        $items = DB::table('cart')
                    ->join('menu', 'menu.id', '=', 'cart.menu_id')
                    ->join('menu_categories', 'menu_categories.id', '=', 'cart.category_id')
                    ->where('status', "added")
                    ->where('user_id', Auth::user()->id)
                    ->select('cart.*', 'menu.menu_name', 'menu.price', 'menu_categories.category_name')
                    ->orderBy('category_name', 'ASC')
                    ->orderBy('menu_name', 'ASC')
                    ->get();

        return view('userGuest.guest_cart', ['items' => $items]);
    }

    public function GuestUpdateCartItem(Request $request, $id){
        $getcategory = DB::table('menu')->where('id', $id)->first();
        $cartitem = DB::table('cart')->where('id', $id);
        
        if($request->input('value') == "add"){
            $cartitem->update(['quantity' => DB::raw('quantity + 1')]);
        } else {
            // $cartitem->where('quantity', '>', 1);
            $cartitem->update(['quantity' => DB::raw('quantity - 1')]);
        }

        $deletezeros = DB::table('cart')->where('quantity', '<=', 0)->where('user_id', Auth::user()->id)->delete();

        return $getcategory->category_id;
    }

    public function GuestCheckoutOrder(){
        $cartitems = DB::table('cart')->where('status', 'added')->where('user_id', Auth::user()->id)->get();

        $totalamount = 0;
        
        $orderheader = DB::table('order_header')->insertGetId([
            'user_id' => Auth::user()->id,
            'total_amount' => $totalamount,
            'order_status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        foreach($cartitems AS $item){
            $itemdesc = DB::table('menu')->where('id', $item->menu_id)->pluck('price');

            $itemamout = ($item->quantity * $itemdesc[0]);
            DB::table('order_detail')->insert([
                'order_header_id' => $orderheader,
                'menu_id' => $item->menu_id,
                'category_id' => $item->category_id,
                'quantity' => $item->quantity,
                'amount' => $itemamout,
                'status' => 'pending',
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->id
            ]);

            $totalamount += $itemamout;
        }

        DB::table('order_header')->where('id', $orderheader)->update(['total_amount' => $totalamount]);

        DB::table('cart')->where('user_id', Auth::user()->id)->update(['status' => 'checkout']);

        
    }
}
