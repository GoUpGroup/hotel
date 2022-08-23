<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StateController;
 use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\WalltsController;
use \App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlocklistController;
use App\Http\Controllers\OwnerHotelController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\IdentityTypeController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*Category*/
Route::group(['middleware' => 'is.admin'], function () {
    Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name('superAdmin');
    Route::get('/blocklist', [PoliciesController::class, "listBlocklist"])->name("list_policies");
    Route::get('/add_policies', [PoliciesController::class, "addPolicies"])->name("add_policies");
    Route::post('/save_policies', [PoliciesController::class, "store"])->name("save_policies");
    Route::get('edit_policies/{PoliceId}', [PoliciesController::class, 'edit'])->name('edit_policies');
    Route::post('update_policies/{PoliceId}', [PoliciesController::class, 'update'])->name('update_policies');
    Route::get('toggle_policies/{PoliceId}', [PoliciesController::class, 'toggle'])->name('toggle_policies');
########## user route
    Route::get('/list_user', [UserProfileController::class, "listUser"])->name("list-user");
    Route::get('toggle_users/{userId}', [UserProfileController::class, 'toggle'])->name('toggle_users');
    Route::get('edit_users/{userId}', [UserProfileController::class, 'editUser'])->name('edit_user');
    Route::post('update_user/{PoliceId}', [UserProfileController::class, 'updateUser'])->name('update_users');

    
############## route address
############## route state
    Route::get('/add_state', [StateController::class, "create"])->name("add_state");
    Route::post('/save_state', [StateController::class, "store"])->name("store_state");
    Route::get('edit_state/{stateId}', [StateController::class, 'edit'])->name('edit_state');
    Route::post('update_state/{stateId}', [StateController::class, 'update'])->name('update_state');
    Route::get('toggle_state/{stateId}', [StateController::class, 'toggle'])->name('toggle_state');
    Route::get('list_state', [StateController::class, 'listState'])->name('list_state');

############## route city

    Route::get('/add_city', [CityController::class, "create"])->name("add_city");
    Route::post('/save_city', [CityController::class, "store"])->name("store_city");
    Route::get('/edit_city/{cityId}', [CityController::class, 'edit'])->name('edit_city');
    Route::post('/update_city/{cityId}', [CityController::class, 'update'])->name('update_city');
    Route::get('/toggle_city/{cityId}', [CityController::class, 'toggle'])->name('toggle_city');
    Route::get('/list_city', [CityController::class, 'listCity'])->name('list_City');
    Route::get('/report', [WalltsController::class, 'index'])->name('report');

    ##Blocklist
    Route::get('/admin', [UserProfileController::class, 'checkuserRole'])->name('admin');
    Route::get('/blocklist',[BlocklistController::class,'index'])->name('listBlocklist');
    Route::post('/storeblocklist',[BlocklistController::class,'store'])->name('storeblocklist');
    Route::get('/edit_blocklistPersons/{personId}',[BlocklistController::class,'edit'])->name('edit_blocklistPersons');
    Route::post('/update_blocklistPersons/{personId}',[BlocklistController::class,'update'])->name('updateblocklist');
    Route::get('/toggle_blocklistPersons/{personId}',[BlocklistController::class,'toggle'])->name('toggle_blocklistPersons');
    Route::get('/checkBlocklist',[BlocklistController::class,'checkBlocklist'])->name('checkBlocklist');
    ##Owner Hotel
    Route::get('/hotellist',[OwnerHotelController::class,'index'])->name('hotelist');
    Route::get('/store_owner_hotel',[OwnerHotelController::class,'store'])->name('storeOwnerHotel');
    Route::get('/edit_hotel/{id}',[OwnerHotelController::class,'edit'])->name('edithotel');

     ##Nationality
     Route::get('/add_nationality', [NationalityController::class, "index"])->name("listNationality");
     Route::post('/save_nationality', [NationalityController::class, "store"])->name("store_nationality");
     Route::get('edit_nationality/{nationalityId}', [NationalityController::class, 'edit'])->name('edit_nationality');
     Route::post('update_nationality/{nationalityId}', [NationalityController::class, 'update'])->name('update_nationality');
     Route::get('toggle_nationality/{nationalityId}', [NationalityController::class, 'toggle'])->name('toggle_nationality');
     Route::get('list_nationality', [NationalityController::class, 'listnationality'])->name('list_nationality');
 
     ##Identity  Type
     Route::get('/add_identity_type', [IdentityTypeController::class, "index"])->name("listIdentityType");
     Route::post('/save_identity_type', [IdentityTypeController::class, "store"])->name("store_identity_type");
     Route::get('edit_identity_type/{IdentityTypeId}', [IdentityTypeController::class, 'edit'])->name('edit_identity_type');
     Route::post('update_identity_type/{IdentityTypeId}', [IdentityTypeController::class, 'update'])->name('update_identity_type');
     Route::get('toggle_identity_type/{IdentityTypeId}', [IdentityTypeController::class, 'toggle'])->name('toggle_identity_type');
     Route::get('list_identity_type', [IdentityTypeController::class, 'listIdentity_type'])->name('list_identity_type');
    Route::get('list_blocklidt',[BlocklistController::class,'index'])->name();
});
