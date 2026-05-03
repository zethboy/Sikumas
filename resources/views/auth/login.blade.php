@extends('layouts.app')

@section('title', 'Login | SIKUMAS')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-green-50 py-12 px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-green-700">Welcome Back!</h2>
            <p class="text-gray-600 text-sm">Masuk ke akun SIKUMAS Anda</p>
        </div>

        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email atau Username</label>
                <input type="text" name="login" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500"
                  placeholder="Masukkan email atau username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-500" placeholder="Enter your password">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 rounded-lg hover:bg-green-600 transition">
                Login
            </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="text-green-600 font-semibold hover:underline">Daftar</a>
        </p>
    </div>
</div>
@endsection
