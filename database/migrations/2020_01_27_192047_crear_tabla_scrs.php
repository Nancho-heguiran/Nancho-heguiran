<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaScrs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fechapreparacion');
            $table->string('nuip')->nullable();
            $table->string('serial_np')->nullable();
            $table->string('name')->nullable();

            $table->unsignedBigInteger('clasetramite_id')->nullable();
            $table->foreign('clasetramite_id', 'fk_scrs_clasetramite')->references('id')->on('clasetramites')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('tipotramite_id')->nullable();
            $table->foreign('tipotramite_id', 'fk_scrs_tipotramite')->references('id')->on('tipotramites')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id', 'fk_scrs_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('oficina_id')->nullable();
            $table->foreign('oficina_id', 'fk_scrs_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->bigInteger('adhesivo')->nullable();
            $table->bigInteger('valor_aplicado')->nullable();

            $table->unsignedBigInteger('claseformas_id')->nullable();
            $table->foreign('claseformas_id', 'fk_scrs_claseformas')->references('id')->on('claseformas')->onDelete('restrict')->onUpdate('restrict');
            
            $table->string('comentarios')->nullable();
            
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->foreign('genero_id', 'fk_scrs_genero')->references('id')->on('generos')->onDelete('restrict')->onUpdate('restrict');
            
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
        Schema::dropIfExists('scrs');
    }
}
