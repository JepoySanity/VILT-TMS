<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthRedirectAuthenticatedUsers;
use App\Http\Controllers\Pages\AdminPagesController;
use App\Http\Controllers\Pages\AgentPagesController;
use App\Http\Controllers\Pages\UserPagesController;

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

//Landing Page route
Route::get('/', function () {
    return redirect('/login');
});

//Route for authenticated users
Route::group(['middleware'=>'auth'],function(){
    //route for deciding where user will be redirected depending on their assigned role
    Route::get('/redirectAuthenticatedUsers', [AuthRedirectAuthenticatedUsers::class, 'redirect_user'])->name('to.dashboard');
    //routes for admin users
    Route::group(['middleware'=>'checkRole:admin'],function(){
        Route::get('/admin/dashboard',[AdminPagesController::class,'index'])->name('admin.dashboard');       
    });
    //routes for user users
    Route::group(['middleware'=>'checkRole:user'],function(){
        Route::get('/user/dashboard',[UserPagesController::class,'index'])->name('user.dashboard');    
    });
    //routes for agent users
    Route::group(['middleware'=>'checkRole:agent'],function(){
        Route::get('/agent/dashboard',[AgentPagesController::class,'index'])->name('agent.dashboard');    
    });
});

//dummy route for logout
Route::get('/logout',function(){
    return auth()->logout();
});

require __DIR__.'/auth.php';
