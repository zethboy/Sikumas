<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

// ==================== PUBLIC ROUTES ====================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/edukasi', [PageController::class, 'education'])->name('education');

// ==================== AUTH ROUTES (GUEST ONLY) ====================
Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
  Route::post('/login', [AuthController::class, 'login']);
  Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
  Route::post('/register', [AuthController::class, 'register']);
});

// ==================== AUTH ROUTES (LOGIN REQUIRED) ====================
Route::middleware('auth')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  // Profile
  Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
  Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

  // Seller Dashboard & Produk
  Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
  Route::post('/seller/products', [SellerController::class, 'store'])->name('seller.products.store');
  Route::get('/seller/products/{product}/edit', [SellerController::class, 'edit'])->name('seller.products.edit');
  Route::put('/seller/products/{product}', [SellerController::class, 'update'])->name('seller.products.update');
  Route::delete('/seller/products/{product}', [SellerController::class, 'destroy'])->name('seller.products.destroy');

  // Seller Monitoring Pesanan
  Route::get('/seller/orders', [OrderController::class, 'sellerOrders'])->name('seller.orders');
  Route::put('/seller/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('seller.orders.status');
  Route::put('/seller/orders/{order}/tracking', [OrderController::class, 'updateTracking'])->name('seller.orders.tracking');

  // Cart
  Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
  Route::post('/keranjang', [CartController::class, 'store'])->name('cart.store');
  Route::put('/keranjang/{cart}', [CartController::class, 'update'])->name('cart.update');
  Route::delete('/keranjang/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
  Route::post('/beli-sekarang', [CartController::class, 'buyNow'])->name('cart.buynow');
  
  // Checkout & Payment Proof
  Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
  Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
  Route::post('/orders/{order}/payment', [CheckoutController::class, 'uploadPayment'])->name('orders.payment');

  // Buyer Orders (Riwayat)
  Route::get('/pesanan-saya', [OrderController::class, 'myOrders'])->name('orders.my');
  Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

  // Review / Komentar
  Route::post('/orders/{order}/review', [ReviewController::class, 'store'])->name('reviews.store');
});
