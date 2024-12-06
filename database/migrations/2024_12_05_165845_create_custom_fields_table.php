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
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_type_id')->constrained('report_types')->cascadeOnDelete();
            $table->string('name');
            $table->enum('type', ['text', 'number', 'date', 'select', 'radio', 'checkbox', 'file', 'image', 'textarea', 'email', 'tel', 'url']); // Tipo do campo
            $table->json('options')->nullable(); // Opções (para select, radio)
            $table->boolean('is_required')->default(false); // Campo obrigatório?
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_fields');
    }
};
