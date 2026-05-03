<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
  public function index()
  {
    $carts = Cart::with('product')->where('user_id', Auth::id())->get();
    $total = $carts->sum(fn($item) => $item->product->price * $item->quantity);
    return view('pages.cart', compact('carts', 'total'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'product_id' => 'required|exists:products,id',
      'quantity' => 'required|integer|min:1'
    ]);

    $product = Product::findOrFail($request->product_id);

    // BLOCK: tidak boleh beli produk sendiri
    if ($product->user_id === Auth::id()) {
      return back()->with('error', 'Anda tidak dapat membeli produk sendiri!');
    }

    $existing = Cart::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->first();

    if ($existing) {
      $existing->update(['quantity' => $existing->quantity + $request->quantity]);
      $message = 'Jumlah produk diperbarui!';
    } else {
      Cart::create([
        'user_id' => Auth::id(),
        'product_id' => $request->product_id,
        'quantity' => $request->quantity
      ]);
      $message = 'Produk berhasil ditambahkan ke keranjang!';
    }

    return redirect()->route('cart.index')->with('success', $message);
  }

  public function update(Request $request, Cart $cart)
  {
    $cart->update($request->validate(['quantity' => 'required|integer|min:1']));
    return back()->with('success', 'Jumlah diperbarui.');
  }

  public function destroy(Cart $cart)
  {
    $cart->delete();
    return back()->with('success', 'Item dihapus.');
  }

  // Tambah ini di dalam class CartController
  public function buyNow(Request $request)
  {
    $request->validate([
      'product_id' => 'required|exists:products,id',
      'quantity' => 'required|integer|min:1'
    ]);

    $product = Product::findOrFail($request->product_id);

    // BLOCK: tidak boleh beli produk sendiri
    if ($product->user_id === Auth::id()) {
      return back()->with('error', 'Anda tidak dapat membeli produk sendiri!');
    }

    Cart::where('user_id', Auth::id())->delete();

    Cart::create([
      'user_id' => Auth::id(),
      'product_id' => $request->product_id,
      'quantity' => $request->quantity
    ]);

    return redirect()->route('checkout.index');
  }
}
