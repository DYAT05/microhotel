<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontdeskController;
use App\Http\Controllers\FrontdeskInvoiceController;
use App\Http\Controllers\BeaneryController;
use App\Http\Controllers\Admin\MRoomController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Guest\GuestOrderController;
use App\Http\Controllers\Admin\ManageRoomController;
use App\Http\Controllers\Guest\GuestInvoiceController;
use App\Http\Controllers\FrontdeskReservationController;
use App\Http\Controllers\Guest\GuestInformationController;
use App\Http\Controllers\Guest\GuestReservationController;
use App\Models\Manage_Room;
use App\Http\Controllers\Guest\PDFController;
use App\Http\Controllers\Admin\BookingHistoryController;
use App\Http\Controllers\Admin\ReportsController;


/*


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//-------------- Admin Routes --------------//
Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    // Hindi pwedeng maview ang dashboard ng admin hanggat di nag login dahil nilagyan ko sya ng middleware
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');
    //Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
//     Route::post('/admin/register/create', [AdminController::class, 'create'])
// ->name('admin.register.create');

// DYAT
 Route::post('/admin/register/create', [AdminController::class, 'AdminRegisterCreate'])
->name('admin.register.create');

//DYAT
    Route::post('/register/update/{id}',[AdminController::class, 'AdminRegisterUpdate'])->name('admin.register.update');

    // Change Password Route for Admin
    Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('admin.changePassword');
    Route::post('/change-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');

    // View of List Users
    Route::get('/guest-list', [AdminController::class, 'GuestList'])->name('admin.guestList');
    Route::get('/new-guest-list', [AdminController::class, 'GuestNewList'])->name('admin.guestNewList');
    Route::get('/frontdesk-list', [AdminController::class, 'FrontdeskList'])->name('admin.frontdeskList');
    Route::get('/new-frontdesk-list', [AdminController::class, 'FrontdeskNewList'])->name('admin.frontdeskNewList');
    Route::get('/admin-list', [AdminController::class, 'AdminList'])->name('admin.adminList');
    Route::get('/new-admin-list', [AdminController::class, 'AdminNewList'])->name('admin.adminNewList');
    Route::get('/cashier-list', [AdminController::class, 'cashierList'])->name('admin.cashierList');

// DYAT
Route::get('/kitchen-list', [AdminController::class, 'kitchenList'])->name('admin.kitchenList');
Route::get('/new-kitchen-list', [AdminController::class, 'kitchenNewList'])->name('admin.kitchenNewList');
// DYAT
    Route::get('/new-cashier-list', [AdminController::class, 'cashierNewList'])->name('admin.cashierNewList');
    Route::get('/stockcontroller-list', [AdminController::class, 'stockControllerList'])->name('admin.stockcontrollerList');
    Route::get('/new-stockcontroller-list', [AdminController::class, 'stockControllerNewList'])->name('admin.stockcontrollerNewList');
    Route::get('/room-list', [AdminController::class, 'Rooms'])->name('admin.roomList');

    Route::post('/admin/roomupdate/{id}', [ManageRoomController::class, 'update'])->name('admin.room.update');

    Route::get('/menu-list/{id}', [AdminController::class, 'Menu'])->name('admin.menuList');
    Route::get('/menu-dashboard', [AdminController::class, 'MenuDashboard'])->name('admin.menuListDashboard');
    Route::post('/menu/store', [AdminController::class, 'MenuItemStore'])->name('admin.menu.store');
    Route::post('/update/{id}', [AdminController::class, 'MenuItemUpdate'])->name('admin.menu.update');

    Route::get('/manage-dashboard', [AdminController::class, 'DashboardUpdate'])->name('admin.manageDashboard');
    Route::get('/manage-faq', [AdminController::class, 'FaqMaintenance'])->name('admin.faqMaintenance');
    Route::post('/createFaq', [AdminController::class, 'createFaq'])->name('admin.faq.store');
    Route::post('/admin/update/{id}', [AdminController::class, 'updateFaq'])->name('admin.faq.update');
    Route::patch('/admin/{id}/deleteFaq', [AdminController::class, 'deleteFaq'])->name('admin.deleteFaq');
    Route::post('/update-dashboard/{id}', [AdminController::class, 'DashboardExecUpdate'])->name('admin.dashboard.update');
    Route::get('/cancel_expired', [AdminController::class, 'cancelExpiredReservation'])->name('admin.cancel.expired');
    Route::get('/guest-feedback', [AdminController::class, 'DashboardGuestFeedback'])->name('admin.guestFeedback');

    // Deactivate users
    Route::patch('/admin/{id}/inactive', [AdminController::class, 'inactive'])->name('admin.deactivate');
    Route::patch('/admin/{id}/active', [AdminController::class, 'active'])->name('admin.activate');
   
    Route::patch('/admin/{id}/inactiveAdmin', [AdminController::class, 'inactiveAdmin'])->name('admin.deactivateAdmin');
    Route::patch('/admin/{id}/activeAdmin', [AdminController::class, 'activeAdmin'])->name('admin.activateAdmin'); 
 
    Route::get('/roomtypes', [AdminController::class, 'RoomTypesIndex'])->name('admin.roomtype.index');
    Route::get('/menucategories', [AdminController::class, 'MenuCategoriesIndex'])->name('admin.menucategories.index');
    Route::patch('/admin/{id}/deleteRoomType', [AdminController::class, 'deleteRoomType'])->name('admin.deleteroomtype');
    Route::post('/createRoomType', [AdminController::class, 'createRoomType'])->name('admin.roomtype.store');
    Route::post('/createMenuCategories', [AdminController::class, 'createMenuCategories'])->name('admin.menucategories.store');
    Route::patch('/admin/{id}/deleteMenuCategories', [AdminController::class, 'deleteMenuCategories'])->name('admin.deletemenucategory');
//    DYAT
    Route::post('/updateMenuCategories/{id}', [AdminController::class, 'updateMenuCategories'])
    ->name('admin.menucategories.update');
// DYAT
    // Manage Rooms
    Route::prefix('room')->group(function () {
            Route::get('/', [ManageRoomController::class, 'index'])->name('admin.room.index')->middleware('admin');
             Route::get('/create', [ManageRoomController::class, 'create'])->name('admin.room.create');
            Route::post('/', [ManageRoomController::class, 'store'])->name('admin.room.store');
            // Route::get('/{room}', [ManageRoomController::class, 'show'])->name('admin.room.show');
            // Route::get('/room/edit', [ManageRoomController::class, 'edit'])->name('admin.room.edit');
            // Route::put('/{room}', [ManageRoomController::class, 'update'])->name('admin.room.update');
            Route::delete('/{room}', [ManageRoomController::class, 'destroy'])->name('admin.room.destroy');
            // Route::put('/room/{id}', [ManageRoomController::class, 'update'])->name('admin.room.update');
        });   

          
    // Admin Booking History
    Route::prefix('booking-history')->group(function () {
            Route::get('/', [BookingHistoryController::class, 'index'])->name('admin.bookingHistory')->middleware('admin');;
            Route::get('/filter', [BookingHistoryController::class, 'filter'])->name('admin.filter-history');
        });
    
    // Admin Reports
    Route::prefix('reports')->group(function () {
            Route::get('/', [ReportsController::class, 'index'])->name('admin.reports')->middleware('admin');
            Route::get('/preview', [ReportsController::class, 'preview'])->name('admin.reports.preview')->middleware('admin');
            Route::get('/clear', [ReportsController::class, 'preview'])->name('admin.reports.clear')->middleware('admin');
            Route::post('/print', [ReportsController::class, 'printPDF'])->name('admin.reports.print')->middleware('admin');
            Route::get('/overallsales', [ReportsController::class, 'overallSales'])->name('admin.overallsales')->middleware('admin');
            Route::get('/overallsalespreview', [ReportsController::class, 'overallSalesPreview'])->name('admin.overallsales.preview')->middleware('admin');
            Route::get('/restaurant', [ReportsController::class, 'restaurantReport'])->name('admin.restaurant')->middleware('admin');
            Route::get('/restaurantpreview', [ReportsController::class, 'restaurantReportPreview'])->name('admin.restaurantreport.preview')->middleware('admin');
            Route::get('/inventory', [ReportsController::class, 'inventoryReport'])->name('admin.inventory')->middleware('admin');
            Route::get('/inventorypreview', [ReportsController::class, 'inventoryReportPreview'])->name('admin.inventory.preview')->middleware('admin');
        });
});
//-------------- End Admin Routes --------------//



//-------------- Frontdesk Routes --------------//
Route::prefix('frontdesk')->middleware(['deactivateFrontdesk'])->group(function () {
    // Routes that require auth and DeactivateFrontdesk middleware
  
    Route::get('/login',[FrontdeskController::class, 'Index'])->name('frontdesk_login_form');
    Route::post('/login/owner',[FrontdeskController::class, 'FrontdeskLogin'])->name('frontdesk.login');
    // Hindi pwedeng maview ang dashboard ng admin hanggat di nag login dahil nilagyan ko sya ng middleware
    Route::get('/dashboard',[FrontdeskController::class, 'Dashboard'])->name('frontdesk.dashboard')->middleware('frontdesk');
    Route::get('/logout',[FrontdeskController::class, 'FrontdeskLogout'])->name('frontdesk.logout')->middleware('frontdesk');
    Route::get('/register', [FrontdeskController::class, 'FrontdeskRegister'])->name('frontdesk.register');
    Route::post('/register/create',[FrontdeskController::class, 'FrontdeskRegisterCreate'])->name('frontdesk.register.create');

    Route::get('/reservation/view', [FrontdeskController::class, 'FrontdeskReservation'])->name('frontdesk.reservation');
    Route::post('/reservation/create/roomid', [FrontdeskController::class, 'GetRoomID'])->name('frontdesk.reservation.create');
    Route::post('/reservation/create/roomidlist', [FrontdeskController::class, 'GetRoomIDs'])->name('frontdesk.reservation.roomlist');
    Route::post('/reservation/create/roomguestcount', [FrontdeskController::class, 'GetRoomGuestCount'])->name('frontdesk.reservation.guestcount');
    Route::post('/reservation', [FrontdeskController::class, 'FrontdeskReservationSave'])->name('frontdesk.save.reservation');
    Route::get('/reservation/frontdesk_view_invoice', [FrontdeskInvoiceController::class, 'FrontdeskViewInvoice'])->name('frontdesk.view.invoice');
    Route::get('/reservation/frontdesk_guest_invoice/view', [FrontdeskInvoiceController::class, 'ViewInvoiceAsPdf'])->name('frontdesk.invoice.view.pdf');
    Route::get('/reservation/frontdesk_guest_invoice/generate', [FrontdeskInvoiceController::class, 'FrontdeskGenerateInvoice'])->name('frontdesk.invoice.generate.pdf');
    Route::get('/bookingdetails', [FrontdeskController::class, 'FrontdeskBookingDetails'])->name('frontdesk.bookingdetails');
    Route::delete('/bookingdetails/{reservation_id}',  [FrontdeskController::class, 'softDeletesReservation'])->name('frontdesk.bookingdetails.softdelete');
    Route::get('/bookingdetails/deleted-guest-information',  [FrontdeskController::class, 'ViewDeletesReservation'])->name('frontdesk.bookingdetails.softdelete.view');
    
    Route::get('/payment', [FrontdeskController::class, 'FrontdeskPayment'])->name('frontdesk.payment');
    Route::get('/confirmed-booking', [FrontdeskController::class, 'FrontdeskConfirmedBooking'])->name('frontdesk.cofirmedbooking');
    Route::get('/guest-today', [FrontdeskController::class, 'FrontdeskGuestToday'])->name('frontdesk.guesttoday');
    Route::post('/update-booking-status/{reservation_Id}',  [FrontdeskController::class, 'updateBookingStatus'])->name('frontdesk.bookingstatus');
    Route::post('/update-booking-checkin/{reservation_Id}',  [FrontdeskController::class, 'updateBookingCheckin'])->name('frontdesk.bookingcheckin');
    Route::post('/update-booking-checkout/{reservation_Id}',  [FrontdeskController::class, 'updateBookingCheckout'])->name('frontdesk.bookingcheckout');

    // Reports
    Route::get('/reports', [FrontdeskController::class, 'FrontdeskReports'])->name('frontdesk.reports');
    Route::get('/reports/preview', [FrontdeskController::class, 'preview'])->name('frontdesk.reports.preview');
    Route::get('/reports/clear', [FrontdeskController::class, 'preview'])->name('frontdesk.reports.clear');
    // Route::get('/admin/reports/clear', 'App\Http\Controllers\Admin\ReportsController@clear')->name('admin.reports.clear');

    Route::post('/reports/print', [FrontdeskController::class, 'printPDF'])->name('frontdesk.reports.print');

    Route::patch('/frontdesk/{id}/inactive', [FrontdeskController::class, 'inactive'])->name('frontdesk.inactive');
    Route::patch('/frontdesk/{id}/active', [FrontdeskController::class, 'active'])->name('frontdesk.active');
});
// Route::prefix('frontdesk')->group(function(){
    
// });
//-------------- End Frontdesk Routes --------------//


Route::prefix('cashier')->middleware(['deactivateCashier'])->group(function () {
    Route::post('/register/create',[BeaneryController::class, 'CashierRegisterCreate'])->name('cashier.register.create');
    Route::patch('/cashier/{id}/inactive', [BeaneryController::class, 'inactive'])->name('cashier.deactivate');
    Route::patch('/cashier/{id}/active', [BeaneryController::class, 'active'])->name('cashier.activate');
});


// DYAT
    Route::prefix('kitchen')->middleware(['deactivateKitchen'])->group(function () {
    Route::post('/register/create',[BeaneryController::class, 'KitchenRegisterCreate'])->name('kitchen.register.create');
    Route::patch('/kitchen/{id}/inactive', [BeaneryController::class, 'inactive'])->name('kitchen.deactivate');
    Route::patch('/kitchen/{id}/active', [BeaneryController::class, 'active'])->name('kitchen.activate');
});
// DYAT

Route::prefix('stockcontroller')->middleware(['deactivateStockcontroller'])->group(function () {
    Route::post('/register/create',[BeaneryController::class, 'StockcontrollerRegisterCreate'])->name('stockcontroller.register.create');
    Route::patch('/stockcontroller/{id}/inactive', [BeaneryController::class, 'inactive'])->name('stockcontroller.deactivate');
    Route::patch('/stockcontroller/{id}/active', [BeaneryController::class, 'active'])->name('stockcontroller.activate');
});

//-------------- Guest Routes --------------//

Route::group(['middleware' => ['auth', 'deactivate']], function (){
    Route::post('/dashboard', [GuestController::class, 'GuestReservation'])->middleware(['auth', 'verified'])->name('store.date');
    Route::get('/dashboard', [GuestController::class, 'ViewDashboard'])->name('guest.dashboard');
    Route::post('/userGuest/room_info/{room_id}', [GuestReservationController::class, 'GuestViewRoom'])->name('view.room');
    Route::post('/userGuest/guest_registration', [GuestReservationController::class, 'GuestSaveReserve'])->name('save.reservation');
    Route::get('/userGuest/guest_registration', [GuestReservationController::class, 'ViewGuestInfo'])->name('registration.form');
    Route::post('/userGuest/guest_information', [GuestInformationController::class, 'GuestInfo'])->name('save.guest.info');
    Route::post('/userGuest/invoice', [GuestInformationController::class, 'GuestInfo'])->name('save.invoice');
    Route::get('/guest_users/invoice', [GuestInvoiceController::class, 'view_invoice'])->name('view.invoice');


    // Route::delete('/users/{id}', [GuestController::class, 'destroy'])->name('users.destroy');


    Route::get('/view-invoice', [GuestInvoiceController::class, 'ViewInvoice'])->name('guest.view.invoice');
    Route::get('/generate-invoice', [GuestInvoiceController::class, 'GenerateInvoice'])->name('generate.invoice');

    Route::get('/userGuest/contact', [GuestController::class, 'GuestContact'])->name('guest.contact');
    Route::post('/userGuest/save_feedback', [GuestController::class, 'GuestSubmitFeedback'])->name('guest.submit.feedback');
    Route::get('/userGuest/order-dashboard', [GuestOrderController::class, 'GuestMenuDashboard'])->name('view.items.dashboard');
    Route::get('/userGuest/order/{id}', [GuestOrderController::class, 'GuestMenu'])->name('view.items');
    Route::post('/userGuest/order/add-to-cart', [GuestOrderController::class, 'GuestAddToCart'])->name('save.order.cart');
    Route::get('/userGuest/cart', [GuestOrderController::class, 'GuestCartList'])->name('view.cart');
    Route::post('/userGuest/cart-update/{id}', [GuestOrderController::class, 'GuestUpdateCartItem'])->name('update.cart.items');
    Route::post('/userGuest/checkout', [GuestOrderController::class, 'GuestCheckoutOrder'])->name('save.checkout.order');

});


//-------------- End Guest Routes --------------//

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => []], function (){
    Route::get('/', [DashboardController::class, 'Index'])->name('default.dashboard');
    Route::get('/faq', [DashboardController::class, 'Faq'])->name('faq');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
