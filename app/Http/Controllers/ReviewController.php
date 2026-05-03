<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Review;

class ReviewController extends Controller
{
  public function store(Request $request, Order $order)
  {
    $data = $request->validate([
      'product_id' => 'required|exists:products,id',
      'rating' => 'required|integer|min:1|max:5',
      'comment' => 'required|string|min:5'
    ]);

    // Security checks
    if ($order->user_id !== Auth::id()) {
      abort(403);
    }

    if ($order->status !== 'completed') {
      return back()->with('error', 'Hanya pesanan selesai yang bisa direview.');
    }

    // Check if already reviewed this product in this order
    $exists = Review::where('order_id', $order->id)
      ->where('product_id', $data['product_id'])
      ->where('user_id', Auth::id())
      ->exists();

    if ($exists) {
      return back()->with('error', 'Anda sudah mereview produk ini.');
    }

    Review::create([
      'order_id' => $order->id,
      'product_id' => $data['product_id'],
      'user_id' => Auth::id(),
      'rating' => $data['rating'],
      'comment' => $data['comment']
    ]);

    return back()->with('success', 'Review berhasil dikirim! Terima kasih.');
  }
}
