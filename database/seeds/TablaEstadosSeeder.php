<?php

use Illuminate\Database\Seeder;

class TablaEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('estados')->truncate();

        $estados = [
        	['id' =>1,  'name' =>'Activo',     'created_at' => new DateTime ],
			['id' =>2,  'name' =>'Inactivo',     'created_at' => new DateTime ],
			
          ];

        DB::table('estados')->insert($estados);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
