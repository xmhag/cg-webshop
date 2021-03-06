<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, CartController, ProductController, CategoryController, SupplierController, OrderController, UserController, RoleController, AdminController};

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

// HOME
Route::get ('/', [HomeController::class, 'index'])->name('home');

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

// CART/ORDER ROUTES
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{id}', [CartController::class, 'addItem'])->name('cart.addItem');
Route::get('order', [OrderController::class, 'create'])->middleware(['auth'])->name('order.create');


// Admin: Products, Categories and Suppliers
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('supplier', SupplierController::class);
});

// Admin: User en Roles control
Route::group(['middleware' => ['auth']], function() {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
});





//Route::group(
//        [
//        // 'prefix' => 'admin',
//       // 'name'=> 'admin.',
//        'middleware' => 'role:admin',
//        ]
//        , function () {
//
//        // for all admins
//        Route::get('/', 'AdminController@index')->name('dashboard');
//        Route::get('home', 'AdminController@index')->name('dashboard');
//        Route::get('dashboard', 'AdminController@index')->name('dashboard');
//
//        // for administrator
//        Route::group(['middleware' => ['role:administrator']], function () {
//            //
//        });
//
//        // for moderators
//        Route::group(['middleware' => ['role:administrator|moderator']], function () {
//            // users
//            Route::group(['prefix' => 'users', 'as' => 'users.',], function () {
//                Route::get('all', 'UserController@index')->name('index');
//            });
//        });
//
//        // for managers
//        Route::group(['middleware' => ['role:administrator|moderator|manager']], function () {
//            //
//        });
//
//    });















// User routes
Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit')
        ->middleware(['auth']);
Route::get('profile', [UserController::class, 'show'])->name('profile.show')
        ->middleware(['auth']);
Route::put('profile', [UserController::class, 'update'])->name('profile.update')
        ->middleware(['auth']);





//authentication stuff
require __DIR__ . '/auth.php';



//breeze default log-in destination
Route::view('/dashboard', 'admin.dashboard')
        ->middleware(['auth'])->name('dashboard');

// CART views
// Route::view('buy', 'product.buy');
// Route::view('buy2', 'product.buy2')->middleware(['auth']);
Route::view('congrats', 'product.congrats');

// ADMIN views
Route::redirect('admin', '/admin/product', 307)->middleware(['auth']);
Route::view('admin/login', 'admin.login');
Route::view('admin/productlist', 'admin.productlist');
Route::view('admin/add', 'admin.add');
Route::view('admin/show', 'admin.show');
