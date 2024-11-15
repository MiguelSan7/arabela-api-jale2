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
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->string('cuenta_ok');
            $table->string('nombre');
            $table->integer('numdama');
            $table->integer('anio_campania');
            $table->double('saldo_cobro');
            $table->double('pagos');
            $table->double('resta');
            $table->double('efectividad');
            $table->date('fecha_inicial_vigencia');
            $table->date('fecha_final_vigencia');
            $table->integer('numero_zona');
            $table->integer('rutas');
            $table->string('fase');
            $table->integer('id_causanocobro');
            $table->char('digito_dama');
            $table->integer('codigopostal');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info');
    }
};
