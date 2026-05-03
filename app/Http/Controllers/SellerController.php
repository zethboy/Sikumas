<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class SellerController extends Controller
{
  public function index()
  {
    $products = Product::where('user_id', Auth::id())->get();
    return view('seller.dashboard', compact('products'));
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required',
      'price' => 'required|integer',
      'category' => 'required',
      'stock' => 'required|integer',
      'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
      'description' => 'required',
    ]);

    // Upload gambar
    $path = $request->file('image')->store('products', 'public');

    Product::create([
      'user_id' => Auth::id(),
      'name' => $data['name'],
      'price' => $data['price'],
      'category' => $data['category'],
      'stock' => $data['stock'],
      'description' => $data['description'],
      'image_url' => '/storage/' . $path,
    ]);

    return back()->with('success', 'Produk ditambahkan!');
  }

  public function edit(Product $product)
  {
    $products = Product::where('user_id', Auth::id())->get();
    return view('seller.dashboard', compact('products', 'product'));
  }

  public function update(Request $request, Product $product)
  {
    $data = $request->validate([
      'name' => 'required',
      'price' => 'required|integer',
      'category' => 'required',
      'stock' => 'required|integer',
      'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
      'description' => 'required',
    ]);

    if ($request->hasFile('image')) {
      // Hapus gambar lama jika ada (opsional, abaikan saja kalau mau simpan)
      $path = $request->file('image')->store('products', 'public');
      $product->image_url = '/storage/' . $path;
    }

    $product->update([
      'name' => $data['name'],
      'price' => $data['price'],
      'category' => $data['category'],
      'stock' => $data['stock'],
      'description' => $data['description'],
    ]);

    return redirect()->route('seller.dashboard')->with('success', 'Produk diperbarui!');
  }

  public function destroy(Product $product)
  {
    $product->delete();
    return back()->with('success', 'Produk dihapus!');
  }
}
