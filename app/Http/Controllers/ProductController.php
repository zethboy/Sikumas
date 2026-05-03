<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::with('user')->get();
    return view('pages.products', compact('products'));
  }

  public function show(Product $product)
  {
    $product->load('user');
    $isOwner = Auth::check() && Auth::id() === $product->user_id;
    return view('pages.product-detail', compact('product', 'isOwner'));
  }
}
