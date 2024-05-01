<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopifyAppController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';


//AUTHENTICATE LOGIN - SHOPIFY
Route::middleware('verify.shopify')->group(function () {
    Route::get('/', [ShopifyAppController::class, 'testSession'])->name('home');
    Route::get('/customers', [ShopifyAppController::class, 'customers'])->name('customers');
    Route::get('/orders', [ShopifyAppController::class, 'orders'])->name('orders');
});

// Route::get('/', function () {
//     return view('index');
// })->middleware(['verify.shopify'])->name('home');
 

//TEST HOME
 
// Route::get('/', [ShopifyAppController::class, 'index'])->name('index'); 
 

// //CUSTOMERS PAGE
// Route::get('/customers', function () {
//     return view('customers');
// })->middleware(['verify.shopify'])->name('customers');

// //ORDERS PAGE
// Route::get('/orders', function () {
//     return view('orders');
// })->middleware(['verify.shopify'])->name('orders');





// Route::middleware(['verify.shopify'])->group(function () {
//     Route::view('/orders', 'orders')->name('orders'); //ORDERS PAGE
//     Route::view('/customers', 'customers')->name('customers'); //CUSTOMERS PAGE
//     Route::view('/assign-ticket', 'assign-ticket')->name('assign-ticket'); //ASSIGN TICKET PAGE
//     Route::view('/un-assign-ticket', 'un-assign-ticket')->name('un-assign-ticket'); //UN-ASSIGN TICKET PAGE
//     Route::view('/solved-ticket', 'solved-ticket')->name('solved-ticket'); //SOLVED TICKET PAGE
//     Route::view('/calculator', 'calculator')->name('calculator'); //CALCULATOR PAGE
// });
 

 
