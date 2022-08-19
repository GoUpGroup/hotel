<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReciptionController;

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

    
    Route::get('show_notification', [NotificationController::class, 'index'])->name('show_notification');
    Route::get('makeNotificationSeen/{id}', [NotificationController::class, 'makeNotificationSeen'])->name('makeNotificationSeen');

    #reciption
    Route::get('/listReciption', [ReciptionController::class, 'index'])->name('listReciption');
    Route::post('/storeReciption',[ReciptionController::class,'store'])->name('storeReciption');
    Route::get('/edit_reciption/{id}',[ReciptionController::class,'edit'])->name('edit_reciption');

    Route::get('/dash-respion', [BookingController::class, 'index'])->name('dash-respion');
    Route::get('/dash-hotel-maneger', [BookingController::class, 'index'])->name('hotemDashboard');
    Route::post('/newBooking',[BookingController::class,'store'])->name('newBooking');

    Route::post('/newEscort',[EscortController::class,'store'])->name('newEscort');
});

//Auction
