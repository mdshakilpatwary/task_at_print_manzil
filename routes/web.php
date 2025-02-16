<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllItemController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:marchant'])->name('dashboard');

Route::middleware(['auth','role:marchant'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/merchant/create_store', [AllItemController::class, 'store_index'])->name('store');
    Route::post('/merchant/create_store', [AllItemController::class, 'store'])->name('store.create');
    Route::get('/merchant/create_category', [AllItemController::class, 'category_index'])->name('category');
    Route::post('/merchant/create_category', [AllItemController::class, 'cat_store'])->name('category.create');


});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});



require __DIR__.'/auth.php';
