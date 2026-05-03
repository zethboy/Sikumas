@extends('layouts.app')

@section('title', 'Checkout | SIKUMAS')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-2xl font-bold text-green-700 mb-6">📦 Checkout</h1>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6">
        <h2 class="font-semibold mb-4">Ringkasan Pesanan</h2>
        @foreach($carts as $item)
        <div class="flex justify-between py-2 border-b border-gray-50">
            <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
            <span class="font-medium">Rp {{ number_format($item->product->price * $item->quantity) }}</span>
        </div>
        @endforeach
        <div class="flex justify-between pt-4 text-lg font-bold">
            <span>Total</span>
            <span class="text-green-600">Rp {{ number_format($total) }}</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <h2 class="font-semibold mb-4">Data Pengiriman</h2>
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Alamat Lengkap Pengiriman</label>
                <textarea name="shipping_address" rows="3" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500" placeholder="Nama penerima, No HP, Alamat lengkap, Kode Pos...">{{ old('shipping_address', Auth::user()->address) }}</textarea>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600 transition">
                Buat Pesanan
            </button>
        </form>
    </div>
</div>
@endsection
