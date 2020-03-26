<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cedula')->unique();
            $table->string('name');
            $table->string('login', 50)->unique();
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('direccion');
            $table->string('movil');
            
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id', 'fk_usuarios_estado')->references('id')->on('estados')->onDelete('restrict')->onUpdate('restrict');
           
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_usuarios_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_usuarios_municipios')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('tipousuario_id');
            $table->foreign('tipousuario_id', 'fk_usuarios_tipousuarios')->references('id')->on('tipousuarios')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('claseoficina_id');
            $table->foreign('claseoficina_id', 'fk_usuarios_claseoficina')->references('id')->on('claseoficinas')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_usuarios_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

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
        Schema::dropIfExists('usuarios');
    }
}
