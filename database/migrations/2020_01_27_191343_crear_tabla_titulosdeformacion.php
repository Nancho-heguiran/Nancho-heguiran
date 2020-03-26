<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTitulosdeformacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulosdeformacion', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('niveleducativo_id');
            $table->foreign('niveleducativo_id', 'fk_titulosdeformacion_niveleseducativos')->references('id')->on('niveleseducativos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->string('name');
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
        Schema::dropIfExists('titulosdeformacion');
    }
}
