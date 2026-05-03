<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
  public function index()
  {
    $carts = Cart::with('product')->where('user_id', Auth::id())->get();
    if ($carts->isEmpty()) {
      return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
    }
    $total = $carts->sum(fn($item) => $item->product->price * $item->quantity);
    return view('pages.checkout', compact('carts', 'total'));
  }

  public function store(Request $request)
  {
    $request->validate(['shipping_address' => 'required|string']);

    $carts = Cart::with('product')->where('user_id', Auth::id())->get();
    if ($carts->isEmpty()) {
      return back()->with('error', 'Keranjang kosong!');
    }

    $total = $carts->sum(fn($item) => $item->product->price * $item->quantity);

    $order = Order::create([
      'user_id' => Auth::id(),
      'total_price' => $total,
      'shipping_address' => $request->shipping_address,
      'status' => 'pending'
    ]);

    foreach ($carts as $item) {
      OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $item->product_id,
        'quantity' => $item->quantity,
        'price' => $item->product->price
      ]);
    }

    Cart::where('user_id', Auth::id())->delete();

    return redirect()->route('orders.my')->with('success', 'Pesanan berhasil dibuat! Silakan upload bukti pembayaran.');
  }

  public function uploadPayment(Request $request, Order $order)
  {
    $request->validate([
      'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Security: only order owner can upload
    if ($order->user_id !== Auth::id()) {
      abort(403);
    }

    if ($order->status !== 'pending') {
      return back()->with('error', 'Status pesanan tidak memungkinkan upload bukti.');
    }

    $path = $request->file('payment_proof')->store('payments', 'public');
    $order->update([
      'payment_proof' => '/storage/' . $path,
      'status' => 'paid'
    ]);

    return back()->with('success', 'Bukti pembayaran berhasil diupload! Menunggu konfirmasi penjual.');
  }
}
