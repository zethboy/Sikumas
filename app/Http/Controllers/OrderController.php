<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
  // Buyer: Riwayat pesanan saya
  public function myOrders()
  {
    $orders = Order::where('user_id', Auth::id())
      ->with('items.product')
      ->latest()
      ->get();
    return view('orders.index', compact('orders'));
  }

  // Buyer: Detail pesanan + upload bayar + review
  public function show(Order $order)
  {
    if ($order->user_id !== Auth::id()) {
      abort(403);
    }
    $order->load('items.product', 'reviews');
    return view('orders.show', compact('order'));
  }

  // Seller: Monitoring pesanan masuk
  public function sellerOrders()
  {
    $productIds = Product::where('user_id', Auth::id())->pluck('id');
    $orderIds = OrderItem::whereIn('product_id', $productIds)
      ->pluck('order_id')
      ->unique();

    $orders = Order::whereIn('id', $orderIds)
      ->with(['items.product', 'user'])
      ->latest()
      ->get();

    return view('seller.orders', compact('orders'));
  }

  // Seller: Update status pesanan
  public function updateStatus(Request $request, Order $order)
  {
    $request->validate([
      'status' => 'required|in:pending,paid,processing,shipped,completed,cancelled'
    ]);

    // Verify seller owns at least one product in this order
    $productIds = Product::where('user_id', Auth::id())->pluck('id');
    $hasProduct = $order->items()->whereIn('product_id', $productIds)->exists();

    if (!$hasProduct) {
      abort(403);
    }

    $order->update(['status' => $request->status]);

    return back()->with('success', 'Status pesanan diperbarui menjadi: ' . $request->status);
  }

  // Seller: Input resi pengiriman
  public function updateTracking(Request $request, Order $order)
  {
    $request->validate([
      'tracking_number' => 'required|string|max:255'
    ]);

    $productIds = Product::where('user_id', Auth::id())->pluck('id');
    $hasProduct = $order->items()->whereIn('product_id', $productIds)->exists();

    if (!$hasProduct) {
      abort(403);
    }

    $order->update([
      'tracking_number' => $request->tracking_number,
      'status' => 'shipped'
    ]);

    return back()->with('success', 'Nomor resi ditambahkan. Status: Dikirim.');
  }
}
