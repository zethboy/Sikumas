@extends('layouts.app')

@section('title', 'Register | SIKUMAS')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-green-50 py-12 px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-green-700">Buat Akun</h2>
            <p class="text-gray-600 text-sm">Bergabung dengan Komunitas SIKUMAS</p>
        </div>

        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
            <ul class="list-disc pl-4">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" name="username" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500"
                  placeholder="huruf-kecil-tanpa-spasi">
                <p class="text-xs text-gray-500 mt-1">Hanya huruf, angka, strip (-), dan underscore (_)</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon (WhatsApp)</label>
                <input type="text" name="phone" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tipe Akun</label>
                <select name="type" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
                    <option value="pembeli">Pembeli</option>
                    <option value="penjual">Penjual</option>
                    <option value="dual">Pembeli & Penjual</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 rounded-lg hover:bg-green-600 transition">
                Register
            </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
