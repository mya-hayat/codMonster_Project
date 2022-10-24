<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () { return view('auth.login');  })->middleware('auth');
Route::get('/signup', function () { return view('auth.register');  })->name('auth.register');
Route::get('/dashbord', [DashboardController::class, 'index'])->name('dashbord');

// ************************************************************** //
// ************************** STORE ***************************** //
// ************************************************************** //
Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::post('/store/add', [StoreController::class, 'add'])->name('store.add');
Route::put('/store/delete', [StoreController::class, 'remove'])->name('store.remove');
Route::post('/store/edit', [StoreController::class, 'edit'])->name('store.edit');
Route::put('/store/update', [StoreController::class, 'update'])->name('store.update');
Route::get('/store/{id}', [StoreController::class, 'connected'])->name('store.connected');
Route::post('/store/activate', [StoreController::class, 'activate_store'])->name('activate.store');


Route::put('/stor/{id}', [StoreController::class, 'connected_store'])->name('connected.store');

// ************************************************************** //
// ************************** CATEGORY ***************************** //
// ************************************************************** //
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/add', [CategoryController::class, 'add'])->name('category.add');
Route::put('/category/delete', [CategoryController::class, 'remove'])->name('category.remove');
Route::post('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');


// ************************************************************** //
// ************************** PRODUCT ***************************** //
// ************************************************************** //
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/add', [ProductController::class, 'addView'])->name('product.add.view');
Route::post('/product/add/product', [ProductController::class, 'add'])->name('product.add');
Route::put('/product/delete', [ProductController::class, 'remove'])->name('product.remove');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/update', [ProductController::class, 'update'])->name('product.update');


// ************************************************************** //
// ************************** USER ***************************** //
// ************************************************************** //
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/edit/', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
Route::put('/user/updateMail', [UserController::class, 'updateMail'])->name('user.updateMail');
Route::put('/user/updatePassword', [UserController::class, 'updatePassword'])->name('user.updatePassword');
Route::put('/user/delete', [UserController::class, 'remove'])->name('user.remove');
Route::post('/user/activate', [AdminController::class, 'activate_user'])->name('user.activate');


// ************************************************************** //
// ************************** ORDER ***************************** //
// ************************************************************** //
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/details/{id}' , [OrderController::class , 'order_details'])->name('order.details');
Route::post('/order/editStatus', [OrderController::class, 'edit_status'])->name('edit.status.order');

// ************************************************************** //
// ************************** CUSTOMER ***************************** //
// ************************************************************** //
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/customer/informations/{id}', [CustomerController::class, 'customer_infos'])->name('customer.infos');
Route::post('/customer/update',[CustomerController::class,'update'])->name('customer.update');

//******************************************************************** */
//************************** OPTION *********************************** */
//********************************************************************* */
Route::post('/option', [ProductController::class, 'option_add'])->name('option.add');
Route::post('/option/add/value', [ProductController::class, 'option_add_value'])->name('option.add.value');
Route::post('/option/delete/value', [ProductController::class, 'option_delete_value'])->name('option.delete.value');
Route::post('/option/delete/listOption', [ProductController::class, 'option_delete_listOption'])->name('option.delete.listOption');


//******************************************************************** */
//************************** SETTING *********************************** */
//********************************************************************* */
Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
Route::put('/setting/add', [App\Http\Controllers\SettingController::class, 'store'])->name('settings.add');
Route::get('/setting/script', [App\Http\Controllers\SettingController::class, 'script'])->name('settings.script');


//************************** VARIANTS *********************************** */
//********************************************************************* */
Route::post('/variant/update', [ProductController::class, 'variant_update'])->name('variant.update');
Route::post('/variant/update/all', [ProductController::class, 'variant_update_all'])->name('variant.update.all');

Route::get('/test', [DashboardController::class, 'test'])->name('test');


// *************************************************************************************************** //
               // ************************** ADMIN ***************************** //
// *************************************************************************************************** //
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

/**Store **/
Route::get('/admin/store/', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/store_infos/{id}', [AdminController::class, 'store_infos'])->name('admin.store.infos');

/**User **/
Route::get('/admin/users', [AdminController::class, 'users_list'])->name('users.list');
Route::post('/admin/users/add', [AdminController::class, 'user_add'])->name('user.add');
Route::get('/admin/user_infos/{id}', [AdminController::class, 'user_details'])->name('admin.user.infos');

/**Customer **/
Route::get('/admin/customers', [AdminController::class, 'customers_list'])->name('customer.list');

/**Profil admin **/
Route::put('/admin/update', [AdminController::class, 'update'])->name('admin.update');
Route::put('/admin/updateMail', [AdminController::class, 'updateMail'])->name('admin.updateMail');
Route::put('/admin/updatePassword', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');

//******************************************************************** */
//************************** SETTING *********************************** */
//********************************************************************* */
Route::get('/NIVIA/School_Shoes', [LandingController::class, 'landing_page'])->name('landing.page');
