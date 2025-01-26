<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Models\Campaign;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class,'index']);
Route::get('/campaign',[LandingPageController::class,'showAllCampaign'])->name('index.showCampaign');
Route::get('/campaign/{id}',[LandingPageController::class,'createDonasiUser'])->name('index.createDonasiUser');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('campaign')->group(function(){
    Route::get('/index',[CampaignController::class,'index'])->name('campaign.index');
    Route::get('/create',[CampaignController::class,'create'])->name('campaign.create');
    Route::post('/store',[CampaignController::class,'store'])->name('campaign.store');
    Route::get('/edit/{id}',[CampaignController::class,'edit'])->name('campaign.edit');
    Route::put('/update/{id}',[CampaignController::class,'update'])->name('campaign.update');
    Route::get('/show/{id}',[CampaignController::class,'show'])->name('campaign.show');
Route::get('/destroy/{id}',[CampaignController::class,'destroy'])->name('campaign.destroy');
})->middleware(['auth']);


Route::prefix('donation')->group(function(){
    Route::get('/create-user',[DonationController::class,'createUser'])->name('donation.create-user');
    Route::post('/store-user',[DonationController::class,'storeUser'])->name('donation.store-user');
    Route::get('/show-user/{id}',[DonationController::class,'showUser'])->name('donation.show-user');
    Route::get('/after-payment',[DonationController::class,'afterPayment'])->name('donation.after-payment');
});




require __DIR__.'/auth.php';
