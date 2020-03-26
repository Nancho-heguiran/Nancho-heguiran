<?php

use Illuminate\Database\Seeder;

class TablaGenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('generos')->truncate();

        $generos = [
        	['id' =>1,  'name' =>'Masculino',     'created_at' => new DateTime ],
			['id' =>2,  'name' =>'Femenino',     'created_at' => new DateTime ],
			['id' =>3,  'name' =>'Sin Definir',     'created_at' => new DateTime ],
			
          ];

        DB::table('generos')->insert($generos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
