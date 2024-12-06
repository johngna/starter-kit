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
    Schema::create('report_types', function (Blueprint $table) {
      $table->id();
      $table->string('name'); // Nome do tipo de denúncia
      $table->text('description')->nullable(); // Descrição do tipo de denúncia
      $table->string('icon')->nullable(); // Ícone do tipo de denúncia
      $table->boolean('active')->default(true); // Tipo de denúncia ativo
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('report_types');
  }
};
