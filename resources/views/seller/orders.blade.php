@extends('layouts.app')

@section('title', 'Monitoring Pesanan | SIKUMAS')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-green-700 mb-6">📊 Monitoring Penjualan</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">{{ session('success') }}</div>
        @endif

        <!-- Ringkasan -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-yellow-50 border border-yellow-100 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-yellow-700">{{ $orders->where('status', 'pending')->count() }}</p>
                <p class="text-sm text-yellow-600">Menunggu Bayar</p>
            </div>
            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-blue-700">{{ $orders->where('status', 'paid')->count() }}</p>
                <p class="text-sm text-blue-600">Perlu Diproses</p>
            </div>
            <div class="bg-purple-50 border border-purple-100 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-purple-700">{{ $orders->where('status', 'processing')->count() }}</p>
                <p class="text-sm text-purple-600">Sedang Diproses</p>
            </div>
            <div class="bg-green-50 border border-green-100 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-green-700">{{ $orders->where('status', 'completed')->count() }}</p>
                <p class="text-sm text-green-600">Selesai</p>
            </div>
        </div>

        <!-- Tabel Pesanan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-4 font-semibold text-gray-600">Order ID</th>
                            <th class="p-4 font-semibold text-gray-600">Pembeli</th>
                            <th class="p-4 font-semibold text-gray-600">Produk</th>
                            <th class="p-4 font-semibold text-gray-600">Total</th>
                            <th class="p-4 font-semibold text-gray-600">Status</th>
                            <th class="p-4 font-semibold text-gray-600">Bukti Bayar</th>
                            <th class="p-4 font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr class="border-t border-gray-100 hover:bg-gray-50">
                                <td class="p-4 font-medium">#{{ $order->id }}</td>
                                <td class="p-4">
                                    <p class="font-medium">{{ $order->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $order->user->phone }}</p>
                                </td>
                                <td class="p-4">
                                    @php
                                        $myProductIds = \App\Models\Product::where('user_id', Auth::id())->pluck('id');
                                    @endphp
                                    @foreach ($order->items->whereIn('product_id', $myProductIds) as $item)
                                        <div class="flex items-center gap-2 mb-1">
                                            <img src="{{ asset($item->product->image_url) }}"
                                                class="w-8 h-8 rounded object-cover">
                                            <span class="text-xs">{{ $item->product->name }} x{{ $item->quantity }}</span>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="p-4 font-semibold">Rp {{ number_format($order->total_price) }}</td>
                                <td class="p-4">
                                    <span
                                        class="px-2 py-1 rounded text-xs font-semibold
                                @if ($order->status == 'completed') bg-green-100 text-green-700
                                @elseif($order->status == 'cancelled') bg-red-100 text-red-700
                                @elseif($order->status == 'shipped') bg-blue-100 text-blue-700
                                @elseif($order->status == 'paid') bg-yellow-100 text-yellow-700
                                @elseif($order->status == 'processing') bg-purple-100 text-purple-700
                                @else bg-gray-100 text-gray-700 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    @if ($order->payment_proof)
                                        <a href="{{ asset($order->payment_proof) }}" target="_blank"
                                            class="text-blue-600 hover:underline text-xs">Lihat Bukti →</a>
                                    @else
                                        <span class="text-gray-400 text-xs">-</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col gap-2">
                                        <!-- Update Status -->
                                        <form method="POST" action="{{ route('seller.orders.status', $order) }}"
                                            class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="border rounded text-xs px-2 py-1">
                                                <option value="pending"
                                                    {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>
                                                    Paid</option>
                                                <option value="processing"
                                                    {{ $order->status == 'processing' ? 'selected' : '' }}>Processing
                                                </option>
                                                <option value="shipped"
                                                    {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="completed"
                                                    {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                                                </option>
                                                <option value="cancelled"
                                                    {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                                </option>
                                            </select>
                                            <button type="submit"
                                                class="bg-green-500 text-white text-xs px-2 py-1 rounded hover:bg-green-600">✓</button>
                                        </form>

                                        <!-- Input Resi -->
                                        @if (in_array($order->status, ['processing', 'shipped']))
                                            <form method="POST" action="{{ route('seller.orders.tracking', $order) }}"
                                                class="flex items-center gap-2">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="tracking_number"
                                                    value="{{ $order->tracking_number }}" placeholder="No. Resi"
                                                    class="border rounded text-xs px-2 py-1 w-24">
                                                <button type="submit"
                                                    class="bg-blue-500 text-white text-xs px-2 py-1 rounded hover:bg-blue-600">🚚</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-8 text-center text-gray-500">Belum ada pesanan masuk untuk
                                    produk Anda.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
