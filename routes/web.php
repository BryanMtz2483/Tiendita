<?php

use App\Livewire\Catalogo\CreateCategory;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   // Route::get('/dashboard', CreateCategory::class)->name('dashboard');
});

Route::get('/data', function(){
    $products = Product::with('supplier','category')->get();
    return $products;
    //return $products [0]->supplier->name;
});


