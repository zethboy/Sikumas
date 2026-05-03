<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->string('name');
      $table->string('category'); // Raw Materials, Processed Products, Equipment, Services
      $table->integer('price');
      $table->integer('stock');
      $table->text('description');
      $table->string('image_url');
      $table->timestamps();
    });
  }
  public function down()
  {
    Schema::dropIfExists('products');
  }
};
