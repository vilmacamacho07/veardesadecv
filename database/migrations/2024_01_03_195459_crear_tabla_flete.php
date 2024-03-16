<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flete', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_flete_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');            
            $table->unsignedBigInteger('gondola_id');
            $table->foreign('gondola_id', 'fk_flete_gondola')->references('id')->on('gondola')->onDelete('restrict')->onUpdate('restrict');
            $table->string('origen');
            $table->string('destino');
            $table->date('fecha_salida');
            $table->time('hora_salida', $precision = 0);
            $table->string('mina');
            $table->integer('km');
            //$table->integer('mt3');
            $table->date('fecha_pago');
            $table->string('creado_por', 100);
            $table->string('status')->default('En Ruta');   
            $table->date('fecha_llegada')->nullable();
            $table->time('hora_llegada', $precision = 0)->nullable();
            $table->string('cliente');
            $table->string('material');
            $table->string('notas')->nullable();
           // $table->time('hora_llegada', $precision = 0);          
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flete');
    }
};
