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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('protocol')->unique();
            $table->foreignId('report_type_id')->constrained('report_types')->cascadeOnDelete();
            $table->string('status')->default('pending'); // Status da denúncia (ex.: pending, in_progress, resolved)
            $table->boolean('is_anonymous')->default(false);
            $table->text('details'); // Descrição detalhada do ocorrido
            $table->string('location')->nullable(); // Localização do incidente
            $table->string('zip_code')->nullable(); // CEP do incidente
            $table->string('address')->nullable(); // Endereço do incidente
            $table->string('number')->nullable(); // Número do incidente
            $table->string('complement')->nullable(); // Complemento do incidente
            $table->string('neighborhood')->nullable(); // Bairro do incidente
            $table->string('street')->nullable(); // Rua do incidente
            $table->string('city')->nullable(); // Cidade do incidente
            $table->string('state')->nullable(); // Estado do incidente
            $table->string('country')->nullable(); // País do incidente
            $table->string('reference')->nullable(); // Ponto de referência do incidente
            $table->string('ibge_code')->nullable(); // Código IBGE do incidente
            $table->string('latitude')->nullable(); // Latitude do incidente
            $table->string('longitude')->nullable(); // Longitude do incidente
            $table->dateTime('incident_date')->nullable(); // Data/hora do incidente
            $table->string('reported_by')->nullable(); // Nome do denunciante (caso não seja anônimo)
            $table->string('contact')->nullable(); // Contato do denunciante (opcional)
            $table->string('email')->nullable(); // E-mail do denunciante (opcional)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
