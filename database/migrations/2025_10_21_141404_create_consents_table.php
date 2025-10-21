<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('consents', function (Blueprint $table) {
      $table->id();
      $table->uuid('guid')->unique();
      $table->string('ip_address')->nullable();
      $table->string('user_agent')->nullable();
      $table->unsignedInteger('version')->default(1);
      $table->timestamp('accepted_at');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('consents');
  }
};
