<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationAdminController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Models\Campaign;
use Illuminate\Support\Facades\Route;

//Landing Page
Route::get('/', [LandingPageController::class,'index']);
Route::get('/campaign',[LandingPageController::class,'showAllCampaign'])->name('index.showCampaign');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth','verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Campaign
Route::prefix('campaign')->group(function(){
    Route::get('/index',[CampaignController::class,'index'])->name('campaign.index');
    Route::get('/create',[CampaignController::class,'create'])->name('campaign.create');
    Route::post('/store',[CampaignController::class,'store'])->name('campaign.store');
    Route::get('/edit/{id}',[CampaignController::class,'edit'])->name('campaign.edit');
    Route::put('/update/{id}',[CampaignController::class,'update'])->name('campaign.update');
    Route::get('/show/{id}',[CampaignController::class,'show'])->name('campaign.show');
Route::get('/destroy/{id}',[CampaignController::class,'destroy'])->name('campaign.destroy');
})->middleware(['auth']);

//Donation Admin
Route::prefix('donation')->group(function(){
    Route::get('/index',[DonationAdminController::class,'index'])->name('donation-admin.index');
    Route::get('/create',[DonationAdminController::class,'create'])->name('donation-admin.create');
    Route::post('/store',[DonationAdminController::class,'store'])->name('donation-admin.store');
    Route::get('/show/{id}',[DonationAdminController::class,'show'])->name('donation-admin.show');
    Route::get('/edit/{id}',[DonationAdminController::class,'edit'])->name('donation-admin.edit');
    Route::put('/update/{id}',[DonationAdminController::class,'update'])->name('donation-admin.update');
    Route::get('/destroy/{id}',[DonationAdminController::class,'destroy'])->name('donation-admin.destroy');

});

//Donation User
Route::prefix('donation')->group(function(){
    Route::get('/create-user/{id}',[DonationController::class,'createUser'])->name('donation.create-user');
    Route::post('/store-user',[DonationController::class,'storeUser'])->name('donation.store-user');
    Route::get('/show-user/{id}',[DonationController::class,'showUser'])->name('donation.show-user');
    Route::get('/after-payment',[DonationController::class,'afterPayment'])->name('donation.after-payment');
});




require __DIR__.'/auth.php';
