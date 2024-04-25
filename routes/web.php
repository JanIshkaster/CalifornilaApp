<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//AUTHENTICATE LOGIN - SHOPIFY
Route::get('/', function () {
    return view('index');
})->middleware(['verify.shopify'])->name('home');

//CUSTOMERS PAGE
Route::get('/customers', function(){
    return view('customers');
})->middleware(['auth', 'verified'])->name('customers');

//ORDERS PAGE
Route::get('/orders', function(){
    return view('orders');
})->middleware(['auth', 'verified'])->name('orders');

//ASSIGN TICKET PAGE
Route::get('/assign-ticket', function(){
    return view('assign-ticket');
})->middleware(['auth', 'verified'])->name('assign-ticket');

//UN-ASSIGN TICKET PAGE
Route::get('/un-assign-ticket', function(){
    return view('un-assign-ticket');
})->middleware(['auth', 'verified'])->name('un-assign-ticket');

//SOLVED TICKET PAGE
Route::get('/solved-ticket', function(){
    return view('solved-ticket');
})->middleware(['auth', 'verified'])->name('solved-ticket');


//CALCULATOR PAGE
Route::get('/calculator', function(){
    return view('calculator');
})->middleware(['auth', 'verified'])->name('calculator');
