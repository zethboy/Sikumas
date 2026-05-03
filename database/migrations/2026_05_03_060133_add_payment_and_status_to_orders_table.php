<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::table('orders', function (Blueprint $table) {
      // Status lengkap
      $table->enum('status', [
        'pending',      // baru checkout, belum bayar
        'paid',         // sudah upload bukti bayar
        'processing',   // penjual sedang proses
        'shipped',      // sudah dikirim
        'completed',    // diterima pembeli
        'cancelled'     // dibatalkan
      ])->default('pending')->change();

      // Bukti pembayaran
      $table->string('payment_proof')->nullable()->after('status');

      // Nomor resi pengiriman
      $table->string('tracking_number')->nullable()->after('payment_proof');
    });
  }

  public function down(): void
  {
    Schema::table('orders', function (Blueprint $table) {
      $table->dropColumn(['payment_proof', 'tracking_number']);
    });
  }
};
