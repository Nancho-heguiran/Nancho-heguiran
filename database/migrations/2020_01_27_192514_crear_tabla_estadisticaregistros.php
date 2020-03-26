<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEstadisticaregistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticaregistros', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fechainic');
            $table->date('fechafin');
            $table->date('fechacreacion');

            $table->unsignedBigInteger('mes_id');
            $table->foreign('mes_id', 'fk_estadisticaregistros_mes')->references('id')->on('mes')->onDelete('restrict')->onUpdate('restrict');

            $table->Integer('ano');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id', 'fk_estadisticaregistros_departamentos')->references('id')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id', 'fk_estadisticaregistros_municipios')->references('id')->on('municipios')->onDelete('restrict')->onUpdate('restrict');
              
            $table->unsignedBigInteger('oficina_id');
            $table->foreign('oficina_id', 'fk_estadisticaregistros_oficina')->references('id')->on('oficinas')->onDelete('restrict')->onUpdate('restrict');
         
            $table->integer('rcn_masculino')->nullable();
            $table->integer('rcn_femenino')->nullable();
            $table->integer('rcn_mayores')->nullable();
            $table->integer('rcn_menores')->nullable();
            $table->integer('rcn_indigenas')->nullable();
            $table->integer('rcn_afro')->nullable();
            $table->integer('rcn_decreto290')->nullable();
            $table->integer('rcn_certificaciones')->nullable();
            $table->integer('rcn_rango_1_inic')->nullable();
            $table->integer('rcn_rango_1_fin')->nullable();
            $table->integer('rcn_rango_2_inic')->nullable();
            $table->integer('rcn_rango_2_fin')->nullable();
            $table->integer('rcn_rango_3_inic')->nullable();
            $table->integer('rcn_rango_3_fin')->nullable();
            $table->integer('rcn_rango_4_inic')->nullable();
            $table->integer('rcn_rango_4_fin')->nullable();
            $table->integer('rcn_rango_5_inic')->nullable();
            $table->integer('rcn_rango_5_fin')->nullable();
            $table->integer('rcn_malos')->nullable();
            $table->string('rcn_reg_malos')->nullable();

            $table->integer('rcm_inscritos')->nullable();
            $table->integer('rcm_certificaciones')->nullable();
            $table->integer('rcm_rango_1_inic')->nullable();
            $table->integer('rcm_rango_1_fin')->nullable();
            $table->integer('rcm_rango_2_inic')->nullable();
            $table->integer('rcm_rango_2_fin')->nullable();
            $table->integer('rcm_rango_3_inic')->nullable();
            $table->integer('rcm_rango_3_fin')->nullable();
            $table->integer('rcm_malos')->nullable();
            $table->string('rcm_reg_malos')->nullable();

            $table->integer('rcd_masculino')->nullable();
            $table->integer('rcd_femenino')->nullable();
            $table->integer('rcd_mayores')->nullable();
            $table->integer('rcd_menores')->nullable();
            $table->integer('rcd_indigenas')->nullable();
            $table->integer('rcd_afro')->nullable();
            $table->integer('rcd_certificaciones')->nullable();
            $table->integer('rcd_rango_1_inic')->nullable();
            $table->integer('rcd_rango_1_fin')->nullable();
            $table->integer('rcd_rango_2_inic')->nullable();
            $table->integer('rcd_rango_2_fin')->nullable();
            $table->integer('rcd_rango_3_inic')->nullable();
            $table->integer('rcd_rango_3_fin')->nullable();
            $table->integer('rcd_malos')->nullable();
            $table->string('rcd_reg_malos')->nullable();
            $table->string('raft30')->nullable();
            $table->string('raft29')->nullable();

            $table->string('rcn1danado')->nullable();
            $table->string('rcn2danado')->nullable();
            $table->string('rcn3danado')->nullable();
            $table->string('rcn4danado')->nullable();
            $table->string('rcn5danado')->nullable();
            $table->string('rcn6danado')->nullable();
            $table->string('rcn7danado')->nullable();
            $table->string('rcn8danado')->nullable();
            $table->string('rcn9danado')->nullable();
            $table->string('rcn10danado')->nullable();
            $table->string('rcn11danado')->nullable();
            
            $table->string('rcm1danado')->nullable();
            $table->string('rcm2danado')->nullable();
            $table->string('rcm3danado')->nullable();
            $table->string('rcm4danado')->nullable();
            $table->string('rcm5danado')->nullable();
            $table->string('rcm6danado')->nullable();
            $table->string('rcm7danado')->nullable();
            $table->string('rcm8danado')->nullable();
            $table->string('rcm9danado')->nullable();
            $table->string('rcm10danado')->nullable();
            $table->string('rcm11danado')->nullable();


            $table->string('rcd1danado')->nullable();
            $table->string('rcd2danado')->nullable();
            $table->string('rcd3danado')->nullable();
            $table->string('rcd4danado')->nullable();
            $table->string('rcd5danado')->nullable();
            $table->string('rcd6danado')->nullable();
            $table->string('rcd7danado')->nullable();
            $table->string('rcd8danado')->nullable();
            $table->string('rcd9danado')->nullable();
            $table->string('rcd10danado')->nullable();
            $table->string('rcd11danado')->nullable();


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
        Schema::dropIfExists('estadisticaregistros');
    }
}
