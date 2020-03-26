<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaBarrios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barrios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_barrios_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
                
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_barrios_municipios')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
            
            $table->string('name', 150);
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
        Schema::dropIfExists('barrios');
    }
}
