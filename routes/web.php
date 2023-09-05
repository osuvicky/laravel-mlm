<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\AccountController;

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ReferralController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    //dashborad
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    //biodata
    Route::get('/biodata',[DashboardController::class,'biodata'])->name('biodata');
    Route::post('/biodataReg',[DashboardController::class,'biodataRegister'])->name('biodataReg');
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //referrals
    Route::get('/direct-group',[ReferralController::class,'direct_group'])->name('user.directgroup');
    Route::get('/level-group',[ReferralController::class,'level_group'])->name('user.levelgroup');
    Route::get('/tree',[ReferralController::class,'binary_tree'])->name('user.tree');
    //plans
    Route::get('/plans', [PlanController::class,'allPlans'])->name('plans');
    //payments
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('register_subscription',[PaymentController::class,'register_subscription'])->name('register_subscription');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    //Admin Dashboard
    Route::get('/', [IndexController::class, 'index'])->name('index');
    //Roles
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    //plans
    Route::resource('/plans', PlanController::class);
});
Route::middleware('auth')->group(function () {
      
    Route::get('/portal',[RegController::class,'loadDashboard'])->name('portal');    

        // Nowpayments crypto payment
    Route::get('nowpayments',[PlanController::class,'nowpayments']);
    Route::any('verify-nowpayments',[PaymentController::class,'verify_nowpayments'])->name('verify_nowpayments');
   
    Route::get('/deposit',[AccountController::class,'deposit'])->name('deposit');
    });

Route::get('dropdown',[DropDownController::class,'index']);
Route::post('api/fetch-state',[DropDownController::class,'fatchState']);
Route::post('api/fetch-cities',[DropDownController::class,'fatchCity']);

require __DIR__.'/auth.php';
