<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
  public function showLogin()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $request->validate([
      'login' => 'required|string', // bisa email atau username
      'password' => 'required'
    ]);

    $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    if (Auth::attempt([$field => $request->login, 'password' => $request->password])) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }

    return back()->withErrors(['login' => 'Email/username atau password salah.']);
  }

  public function showRegister()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'username' => 'required|string|max:50|unique:users|alpha_dash',
      'email' => 'required|email|unique:users',
      'phone' => 'required|string',
      'type' => 'required|in:pembeli,penjual,dual',
      'password' => 'required|min:6|confirmed',
    ]);

    $data['password'] = Hash::make($data['password']);
    User::create($data);

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }
}
