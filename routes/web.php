<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MenuController;

  
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
//     return view('welcome');
// });
  

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
  

  
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::resource('menus', MenuController::class);
    /*
    |--------------------------------------------------------------------------
    | Web Routes backend
    |--------------------------------------------------------------------------
    |
    | Here is routs backend controller of menu admin
    |
    |
    |
    */

    Route::get('/get-menu', 'App\Http\Controllers\MenuController@index')->name('get-menu');










    // Route::get('/create-admins', 'App\Http\Controllers\AdminsController@create')->name('create-admins');
    // Route::get('/edit-admins/{id?}', 'App\Http\Controllers\AdminsController@edit')->name('edit-admins');

    // Route::get('/edit-profile-admins/{id?}', 'App\Http\Controllers\AdminsController@editProfile')->name('edit-profile-admins');
    // Route::post('/update-profile-admins/{id?}', 'App\Http\Controllers\AdminsController@updateProfile')->name('update-profile-admins');
    // Route::post('update-admins/{id?}', 'App\Http\Controllers\AdminController@update')->name('update-admins');
    // Route::post('/destroy-admins', 'App\Http\Controllers\AdminsController@destroy')->name('destroy-admins');
    // Route::get('/show-admins/{id?}', 'App\Http\Controllers\AdminsController@show')->name('show-admins');
    // Route::get('/admin/change-status-admins/{id?}', 'App\Http\Controllers\AdminsController@changeStatusAdmins')->name('change-status-admins');



});