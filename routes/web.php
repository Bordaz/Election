<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AspirantController;
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

// Route::get('/', ['UserController::class', 'index'])->name('user.login');

Route::middleware('guest')->group(function () {
    Route::controller(GuestController::class)->group(function(){    
        Route::redirect('/', 'login');
        Route::get('/login', 'GuestLogin')->name('login');
        Route::get('register','GuestRegister')->name('user.register');
        Route::post('/user',[UserController::class, 'Dashboard'])->name('user.dash');
        Route::post('reg',[UserController::class, 'StoreVoters'])->name('user.reg');

    });

});


Route::middleware('auth:voter')->group(function(){
Route::controller(UserController::class)->group(function(){
    Route::get('home','HomePage')->name('user.home');
    Route::get('user_prof','Profile')->name('user.prof');   
    Route::get('logout','SignOutUser')->name('user.logout'); 
    Route::get('userdash', 'UserDash')->name('user.user_dash');  
    Route::get('cast_vote','CastVote')->name('user.castvote');  
});

});


Route::controller(AdminController::class)->group(function(){
    Route::get('admin', 'Adminlogin')->name('admin.log');
    Route::post('adlog','LoginAdmin')->name('admin.login');
    Route::get('dash','AdminDashboard')->name('admin.dash');
    Route::view('add_asp', 'admin.create_aspirant')->name('admin.add_aspirant');
    Route::post('adspirant', 'AddAspirant')->name('admin.adspirant');
    Route::get('logoutadmin', 'LogoutAdmin')->name('admin.logout');
    // Route::post('admin_dash','Dashboard')->name('admin.dash');

});

Route::controller(AspirantController::class)->group(function(){
    Route::get('view_aspirant', 'ViewAspirant')->name('admin.view_aspirant');
    Route::get('edit_aspirant/{id}','EditAspirant')->name('admin.edit_aspirant');
    Route::post('up_aspirant/{id}','UpdateAspirant')->name('admin.update_aspirant');
    Route::get('delete_aspirant/{id}','DeleteAspirant')->name('admin.delete_aspirant');
    Route::get('vote', 'ViewVotes')->name('admin.view_votes');
});