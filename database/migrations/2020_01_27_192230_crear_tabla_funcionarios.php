<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cedula')->unique();
            $table->date('expedicion');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_funcionarios_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_funcionarios_municipios')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
         
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_funcionarios_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');
         
            $table->string('name');
            $table->date('nacimiento');

            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id', 'fk_funcionarios_genero')->references('id')->on('generos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('estadocivil_id');
            $table->foreign('estadocivil_id', 'fk_funcionarios_estadocivil')->references('id')->on('estadosciviles')->onDelete('restrict')->onUpdate('restrict');

            $table->string('clasmilitar');
            $table->string('libreta_militar')->nullable();
            $table->string('distrito')->nullable();
            $table->string('rh');
            $table->string('direccion');
            $table->string('telefono_fijo')->nullable();
            $table->string('movil');
            $table->string('emailpersonal')->nullable();
            $table->string('emailcorporativo')->nullable();

            $table->unsignedBigInteger('niveleducativo_id');
            $table->foreign('niveleducativo_id', 'fk_funcionarios_niveleducativo')->references('id')->on('niveleseducativos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('titulosformacion_id');
            $table->foreign('titulosformacion_id', 'fk_funcionarios_titulosformacion')->references('id')->on('titulosdeformacion')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_funcionarios_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');

            $table->Integer('departamento');
            $table->Integer('municipio_idd');

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
        Schema::dropIfExists('funcionarios');
    }
}
