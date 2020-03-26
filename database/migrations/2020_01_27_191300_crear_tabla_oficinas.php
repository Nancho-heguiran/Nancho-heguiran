<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOficinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_oficina_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_oficina_municipios')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('claseoficina_id');
            $table->foreign('claseoficina_id', 'fk_oficina_claseoficina')->references('id')->on('claseoficinas')->onDelete('restrict')->onUpdate('restrict');
            
            $table->string('name');
            $table->string('namescr')->nullable();

            $table->string('codpmt');
            $table->integer('diastrasporte');
            $table->string('direccion');
            $table->string('telefono_fijo')->nullable();
            $table->string('codigopostal');
           
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
        Schema::dropIfExists('oficinas');
    }
}
