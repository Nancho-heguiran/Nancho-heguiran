<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDespachos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_despachos_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_despachos_usuarios')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            
            $table->date('feccreacion');

            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_despachos_oficinas')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id', 'fk_despachos_funcionarios')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('claseoficina_id');
            $table->foreign('claseoficina_id', 'fk_despachos_claseoficina')->references('id')->on('claseoficinas')->onDelete('restrict')->onUpdate('restrict');

            $table->string('numoficio');


            $table->integer('rcni1')->nullable();
            $table->integer('rcnf1')->nullable();
            
            $table->integer('rcni2')->nullable();
            $table->integer('rcnf2')->nullable();
           
            $table->integer('rcdi1')->nullable();
            $table->integer('rcdf1')->nullable();
            
            $table->integer('rcdi2')->nullable();
            $table->integer('rcdf2')->nullable();
           
            $table->integer('rcmi1')->nullable();
            $table->integer('rcmf1')->nullable();
            
            $table->integer('rcmi2')->nullable();
            $table->integer('rcmf2')->nullable();
            
            $table->integer('decasi1')->nullable();
            $table->integer('decasf1')->nullable();
            
            $table->integer('decasi2')->nullable();
            $table->integer('decasf2')->nullable();
            

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
        Schema::dropIfExists('despachos');
    }
}
