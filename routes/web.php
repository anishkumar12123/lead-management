<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LeadController;
use App\Http\Controllers\RazorpayController;

Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

Route::get('/razorpay',[RazorpayController::class,'index']);
Route::post('/razorpay/payment',[RazorpayController::class,'payment'])->name('razorpay.payment');
Route::get('/razorpay/callback',[RazorpayController::class,'callback'])->name('razorpay.callback');
