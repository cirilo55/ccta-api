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
        Schema::create('entrega_cargas', function (Blueprint $table) {
            $table->id();
            $table->string('cnpjResponsavelArquivo');
            $table->string('cnpjResponsavelEntrega');

            $table->string('dataEmissao');
            $table->string('dataHoraEntrega');
            $table->string('identificacaoCarga');
            $table->string('numeroDocumentoSaida');
            $table->string('observações');
            $table->string('recintoAduaneiro');
            $table->string('tipoCarga');
            $table->string('tipoDocumentoSaida');
            $table->string('tipoEntrega');

            $table->integer('pesoEntrega');

            $table->boolean('comprovanteIcmsApresentado');
            $table->boolean('contingencia');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_cargas');
    }
};
