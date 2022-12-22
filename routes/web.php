<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\AdminAddCouponComponent;
use App\Http\Livewire\AdminCouponsComponent;
use App\Http\Livewire\AdminEditCouponComponent;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () 
    //     {
    //         return view('dashboard');
    //     })->name('dashboard');

    // dashboard
    Route::resource('dashboard', DashboardController::class);

    // show all coupons
    Route::get('/coupons', AdminCouponsComponent::class)->name('coupons');

    // create coupons
    Route::get('/coupon/add', AdminAddCouponComponent::class)->name('addcoupon');

    // edit coupons
    Route::get('coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('editcoupon');
});
