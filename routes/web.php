<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;

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

Route::get('/', function () {
    return view('welcome');
});

include_once __DIR__.'/dashborad.php';
 


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bloges', [App\Http\Controllers\Dashborad\BlogsController::class, 'view_index'])->name('bloges');

Route::post('/login2', [App\Http\Controllers\Auth\CustomAuthenticatedSessionController::class, 'store'])->name('login2');

Route::post('/order', [App\Http\Controllers\OrdersController::class, 'actionAddOrder']) ->name('order');
Route::get('/order/show', [App\Http\Controllers\OrdersController::class, 'showOrders']) ->name('orders');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']) ->name('profile');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'updateDataProfile']) ->name('profile.update');
 
 
Route::post('/user/two-factor-authentication', [TwoFactorController::class, 'enable'])->name('two-factor.enable');

Route::post('/verification/form',  [App\Http\Controllers\Auth\VerificationController::class, 'showForm'])->name('verification.form');

Route::post('/verification/action',  [App\Http\Controllers\Auth\VerificationController::class, 'actionVerification'])->name('verification.action');

Route::post('/register', [App\Http\Controllers\Auth\CustomRegisteredUserController::class, 'register']);
Route::get( '/logout' ,  [App\Http\Controllers\Auth\CustomAuthenticatedSessionController::class, 'destroy'])
->name('logout');