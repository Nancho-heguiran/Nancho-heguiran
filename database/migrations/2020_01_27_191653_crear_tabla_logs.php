<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_logs_usuario')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
           
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_logs_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_logs_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');
            
            $table->string('descripcion');

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
        Schema::dropIfExists('logs');
    }
}
