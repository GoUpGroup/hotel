<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

#####routs for all
Route::get('/', [UserProfileController::class, 'checkuserRole']);

####auth
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    ########## auction route #######
    Route::get('/', [UserProfileController::class, 'checkuserRole']);

    Route::get('/listEmploeis', [UserProfileController::class, 'listEmploeis'])->name('listEmploeis');
    Route::get('/dash-respion', [UserProfileController::class, 'respionDashboard'])->name('dash-respion');
    Route::get('/dash-hotel-maneger', [UserProfileController::class, 'hotemDashboard'])->name('hotemDashboard');
    
    Route::get('show_notification', [NotificationController::class, 'index'])->name('show_notification');
    Route::get('makeNotificationSeen/{id}', [NotificationController::class, 'makeNotificationSeen'])->name('makeNotificationSeen');


});

//Auction
