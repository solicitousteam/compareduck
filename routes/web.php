<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
// return view('welcome');
// });

/****************************************FRONTEND START********************************************************************** */


Route::get('ajax-autocomplete-search', [FrontendController::class,'selectSearch']);

Route::get('ajax-search/{id}', [FrontendController::class,'selectresult']);


Route::get('/',[FrontendController::class,'index']);
Route::get('/blog',[FrontendController::class,'blog']);
Route::get('/login',[FrontendController::class,'login']);
Route::get('/contact',[FrontendController::class,'contact']);
Route::get('/investment',[FrontendController::class,'investment']);
Route::get('/about',[FrontendController::class,'about']);

Route::post('getSubcatt', [FrontendController::class,'getSubcatt']);
Route::get('/data-details/{id}',[FrontendController::class,'datadetails']);
Route::get('search-suggestions', [FrontendController::class,'getSuggestions']);
Route::post('enquiry', [FrontendController::class,'enquiry'])->name('enquiry');



/************************************************************************************************************** */


Route::prefix('admin')->name('admin.')->group(function(){

Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
Route::view('/login','admin.login')->name('login');
Route::post('/check',[AdminController::class,'check'])->name('check');
Route::post('/GoogelMaster',[AdminController::class,'admin.Authenticator']);
});


//    Route::view('GoogelMaster','GoogelMaster');

//    Route::POST('GoogelMaster',[AdminController::class,'GoogelMaster']);



// Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
//Coupon
	Route::get('coupon',[CouponController::class,'index'])->name('coupon.index');;
	Route::get('coupon/add',[CouponController::class,'create'])->name('coupon.add');
	Route::post('coupon/store',[CouponController::class,'store'])->name('coupon.store');
	Route::get('coupon/edit/{id}',[CouponController::class,'edit']);
Route::post('coupon/update/{id}',[CouponController::class,'update']);
Route::get('coupon/status', [CouponController::class,'updateStatus']);


Route::get('coupon/delete/{id}',[CouponController::class,'delete']);

//Tax

Route::get('tax',[TaxController::class,'index'])->name('tax.index');;
Route::get('tax/add',[TaxController::class,'create'])->name('tax.add');
Route::post('tax/store',[TaxController::class,'store'])->name('tax.store');
Route::get('tax/edit/{id}',[TaxController::class,'edit']);
Route::post('tax/update/{id}',[TaxController::class,'update']);
Route::get('tax/status', [TaxController::class,'updateStatus']);
Route::get('tax/delete/{id}',[TaxController::class,'delete']);
//Route::view('/coupon','admin.coupon')->name('coupon.index');


Route::view('/index','admin.index')->name('index');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');



Route::view('/websetting','admin/websetting')->name('websetting');
Route::POST('admin/websetting',[AdminController::class,'websetting']);
Route::get('viewwebsetting',[AdminController::class,'viewwebsetting']);
Route::get('update{id}',[AdminController::class,'updatedata']);
Route::POST('admin/updatewebsetting',[AdminController::class,'updatewebsetting']);


Route::view('/add-category','admin/add-category')->name('add-category');
Route::POST('/addcategroy',[AdminController::class,'addcategroy']);
Route::get('/viewcategroy',[AdminController::class,'viewcategroy']);
Route::get('catupdate{id}',[AdminController::class,'updatecatagroydata']);
Route::POST('admin/updatecategroy',[AdminController::class,'updatecategroy']);
Route::get('/categories.update.status', [AdminController::class,'updateStatus']);


Route::get('delete{id}',[AdminController::class,'deletecategroy']);


/************************************************************************************************************** */


Route::view('/add-subcategory','admin/add-subcategory')->name('add-subcategory');
Route::POST('/add-subcategroy',[AdminController::class,'add_subcategroy']);
Route::get('/view-subcategory',[Admincontroller::class,'view_subcategroy']);
Route::get('/add-subcategory',[AdminController::class,'selectcategory']);

Route::get('subcatupdate{id}',[AdminController::class,'update_subcatagroydata']);
Route::POST('admin/update_subcatagroydata',[AdminController::class,'update_subcategroy']);

Route::get('subcatdelete{id}',[AdminController::class,'deletesubcategroy']);


Route::get('/subcategories.update.status', [AdminController::class,'updatecatStatus']);


/************************************************************************************************************** */



Route::view('/add-childcategory','admin/add-childcategory');



/************************************************************************************************************** */



// Route::view('/add-product','admin/add-product');
Route::get('/add-product',[ProductController::class,'categoryslist']);

Route::post('/getsubcat', [ProductController::class,'getsubcat']);
Route::post('/getchildcat', [ProductController::class,'getchildcat']);
Route::post('/add-product', [ProductController::class,'add_product']);

Route::view('/view-product','admin/view-product');
Route::get('/view-product',[ProductController::class,'proselect']);
Route::get('/product.update.status', [ProductController::class,'updateStatus']);
Route::get('/prodelete{id}',[ProductController::class,'deleteproduct']);
Route::get('/proview{id}',[ProductController::class,'singalproduct']);
Route::get('/proupdate{id}',[ProductController::class,'updateselectproduct']);
Route::POST('admin/update-product',[ProductController::class,'edit']);


/****************************************************View User********************************************************** */

Route::get('/Users',[AdminController::class,'getUsers']);
Route::get('/user.update.status', [AdminController::class,'userStatus']);
Route::get('/GetsingleUsers{id}',[AdminController::class,'GetsingleUsers']);


/****************************************************View User End********************************************************** */
/****************************************************View Order********************************************************** */
Route::get('/orders',[AdminController::class,'getorders']);
Route::get('/orderview{id}',[AdminController::class,'orderview']);

Route::post('/updateOrderStatus',[AdminController::class,'updateOrderStatus']);


/****************************************************View Order End********************************************************** */


/**********************************************Banner Start************************************************************/

Route::get('/Banner',[AdminController::class,'Banner']);
Route::POST('/Add_banner',[AdminController::class,'add_banner']);
Route::get('/view_banner',[AdminController::class,'view_banner']);
Route::get('/banner-delete/{id}',[AdminController::class,'banner_delete']);
Route::get('/banner-update{id}',[AdminController::class,'banner_update']);
Route::POST('/edit-banner',[AdminController::class,'edit_banner']);
Route::get('/banner.update.status', [AdminController::class,'updateBannerStatus']);


/**********************SWITCH*************************************/
Route::get('/view-switchbanner',[AdminController::class,'swithcbanner']);
Route::get('/switch.update.status', [AdminController::class,'updateBannerswitchStatus']);



/**********************************************Banner End************************************************************/
Route::get('/SliderBanner',[AdminController::class,'SliderBanner']);
Route::POST('/add_sliderBanner',[AdminController::class,'add_sliderBanner']);
Route::get('/View-SliderBanner',[AdminController::class,'view_SliderBanner']);
Route::get('/Sliderbanner-delete/{id}',[AdminController::class,'Sliderbanner_delete']);
Route::get('/Sliderbanner-update{id}',[AdminController::class,'Sliderbanner_update']);
Route::POST('/edit-Sliderbanner',[AdminController::class,'edit_Sliderbanner']);
Route::get('/banner.update.status', [AdminController::class,'updateBannerStatus']);


/*************************************************Color***************************************/

Route::get('/Color',[AdminController::class,'Color']);
Route::POST('/addcolor',[AdminController::class,'addcolor']);
Route::get('/View-color',[AdminController::class,'view_color']);
Route::get('/color-update{id}',[AdminController::class,'color_update']);
Route::POST('/coloredit',[AdminController::class,'coloredit']);
Route::get('/color-delete/{id}',[AdminController::class,'color_delete']);


Route::get('/Tax',[AdminController::class,'Tax']);


Route::get('/tabledata',[AdminController::class,'tabledata']);
Route::post('/addtabledata',[AdminController::class,'addtabledata']);
Route::get('/viewDataTable',[AdminController::class,'viewDataTable']);
Route::get('/editDataTable{id}',[AdminController::class,'editDataTable']);
Route::get('/deleteDataTable/{id}',[AdminController::class,'deleteDataTable']);
Route::post('/updateDataTable',[AdminController::class,'updateDataTable']);


Route::get('/upload',[AdminController::class,'uploader']);
Route::post('/uploader',[AdminController::class,'uploader2']);

// });


});



Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});
