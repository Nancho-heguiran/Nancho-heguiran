<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTipotramites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipotramites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);

            $table->unsignedBigInteger('clasetramite_id');
            $table->foreign('clasetramite_id', 'fk_tipotramites_clasetramites')->references('id')->on('clasetramites')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('tipotramites');
    }
}
