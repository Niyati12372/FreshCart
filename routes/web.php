<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminRegisterController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\productController;
use App\Models\product;
use App\Models\Category;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\AdminController;



Route::get('/', function () {
    $allCategory = Category::all();
    $allProducts = product::orderBy('quantity')->with('category')->limit(8)->get();
    return view('client.client_page.home',compact('allProducts','allCategory'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about',function(){
    return view('client.client_page.about');
})->name('about');

Route::get('/contact',function(){
    return view('client.client_page.contact');
})->name('contact');

Route::get('/checkout',[ClientController::class,'checkout'])->name('checkout');
Route::post('/checkout',[ClientController::class,'checkoutPost'])->name('checkout');

Route::middleware(['auth','verified','is_admin:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('admin/profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
    Route::get('/new-product', [productController::class,'create'])->name('new.product');
    Route::post('/new-product', [productController::class,'store']);
    Route::get('/show-product/{id}', [productController::class,'show'])->name('show.product');
    Route::get('/edit-product/{id}', [productController::class,'edit'])->name('edit.product');
    Route::post('/update-product/{id}', [productController::class,'update'])->name('update.product');
    Route::post('/destroy-product/{id}', [productController::class,'destroy'])->name('destroy.product');

    Route::resource('categories',CategoryController::class); 
    Route::resource('products', productController::class);

    Route::get('/admin/orders', [OrderController::class,'allOrders'])->name('all.orders');
    Route::post('/todo', [AdminController::class,'store'])->name('todos.store');
    Route::DELETE('/todo/{id}', [AdminController::class,'destroy'])->name('todos.destroy');
    Route::get('/order/shipped/{id}', [OrderController::class,'orderShiped'])->name('order.shipped');




});

Route::get('/shop',[ClientController::class,'shopView'])->name('shop');
Route::get('/product-view{id}',[ClientController::class,'productView'])->name('product.view');

Route::middleware('auth','verified','is_admin:client')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart-view',[ClientController::class,'cartView'])->name('cart.view');
    Route::post('/increase-quantity',[ClientController::class,'increaseQuantity'])->name('increase.qty');
    Route::post('/decrease-quantity',[ClientController::class,'decreaseQuantity'])->name('decrease.qty');
    Route::delete('/delete-to-cart',[ClientController::class,'deleteToCart'])->name('delete.to.cart');
    Route::get('/client/order',[ClientController::class,'orderView'])->name('order');
    Route::get('/invoice',[ClientController::class,'getInvoice'])->name('get.invoice');



    Route::post('/add-to-cart',[ClientController::class,'addToCart'])->name('add.to.cart');
    Route::get('/category/view/{id}',[ClientController::class,'categoryView'])->name('category.view');
    
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
