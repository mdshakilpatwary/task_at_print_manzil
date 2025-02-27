<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllItemController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;


Route::get('/', function () {
    $products= Product::all();
    $categories= Category::all();
    $stores= Store::all();

    return view('welcome',compact('products','stores','categories'));
});
Route::get('/dashboard', function () {
    $products= Product::where('user_id',Auth::user()->id)->get();
    $stores= Store::all();
    $categories= Category::all();
    return view('dashboard',compact('products','categories','stores'));
})->middleware(['auth', 'verified','role:marchant'])->name('dashboard');

Route::middleware(['auth','role:marchant'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/merchant/create_store', [AllItemController::class, 'store_index'])->name('store');
    Route::post('/merchant/create_store', [AllItemController::class, 'store'])->name('store.create');
    Route::get('/merchant/create_category', [AllItemController::class, 'category_index'])->name('category');
    Route::post('/merchant/create_category', [AllItemController::class, 'cat_store'])->name('store.catagory');
    Route::post('/merchant/product_create', [AllItemController::class, 'product_store'])->name('store.product');


});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});



require __DIR__.'/auth.php';
