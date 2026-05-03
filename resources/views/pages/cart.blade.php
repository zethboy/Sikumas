@extends('layouts.app')

@section('title', 'Keranjang | SIKUMAS')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-2xl font-bold text-green-700 mb-6">🛒 Keranjang Belanja</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">{{ session('error') }}</div>
    @endif

    @if($carts->count() > 0)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <table class="w-full text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 font-semibold text-gray-600">Produk</th>
                    <th class="p-4 font-semibold text-gray-600">Harga</th>
                    <th class="p-4 font-semibold text-gray-600">Jumlah</th>
                    <th class="p-4 font-semibold text-gray-600">Subtotal</th>
                    <th class="p-4 font-semibold text-gray-600"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $item)
                <tr class="border-t border-gray-100">
                    <td class="p-4 flex items-center gap-3">
                        <img src="{{ asset($item->product->image_url) }}" class="w-12 h-12 rounded object-cover">
                        <span class="font-medium">{{ $item->product->name }}</span>
                    </td>
                    <td class="p-4">Rp {{ number_format($item->product->price) }}</td>
                    <td class="p-4">
                        <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="border rounded w-16 px-2 py-1">
                            <button type="submit" class="text-green-600 text-sm hover:underline">Update</button>
                        </form>
                    </td>
                    <td class="p-4 font-semibold">Rp {{ number_format($item->product->price * $item->quantity) }}</td>
                    <td class="p-4">
                        <form method="POST" action="{{ route('cart.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <p class="text-gray-600">Total Pembayaran:</p>
            <p class="text-2xl font-bold text-green-700">Rp {{ number_format($total) }}</p>
        </div>
        <a href="{{ route('checkout.index') }}" class="bg-green-500 text-white font-bold px-8 py-3 rounded-lg hover:bg-green-600 transition">
            Checkout Sekarang
        </a>
    </div>
    @else
    <div class="bg-white p-12 rounded-xl shadow-sm text-center">
        <p class="text-gray-500 mb-4">Keranjang Anda masih kosong.</p>
        <a href="{{ route('products.index') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition">Belanja Sekarang</a>
    </div>
    @endif
</div>
@endsection
