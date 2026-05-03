<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
  public function index()
  {
    return view('profile.index', ['user' => Auth::user()]);
  }

  public function update(Request $request)
  {
    /** @var User $user */
    $user = Auth::user();

    $data = $request->validate([
      'name' => 'required|string|max:255',
      'username' => 'required|string|max:50|alpha_dash|unique:users,username,' . $user->id,
      'email' => 'required|email|unique:users,email,' . $user->id,
      'phone' => 'nullable|string',
      'address' => 'nullable|string',
      'type' => 'required|in:pembeli,penjual,dual',
    ]);

    $user->update($data);

    // Upload QRIS kalau ada
    if ($request->hasFile('qris_image')) {
      $request->validate(['qris_image' => 'image|mimes:png,jpg,jpeg|max:2048']);

      // Hapus lama kalau ada
      if ($user->qris_image && file_exists(public_path($user->qris_image))) {
        unlink(public_path($user->qris_image));
      }

      $path = $request->file('qris_image')->store('qris', 'public');
      $user->update(['qris_image' => '/storage/' . $path]);
    }

    return back()->with('success', 'Profil diperbarui!');
  }
}
