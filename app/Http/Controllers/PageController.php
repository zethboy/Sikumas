<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
  public function home()
  {
    $featured = Product::take(3)->get();
    return view('pages.home', compact('featured'));
  }

  public function products()
  {
    $products = Product::all();
    return view('pages.products', compact('products'));
  }

  public function education()
  {
    return view('pages.education');
  }
}
