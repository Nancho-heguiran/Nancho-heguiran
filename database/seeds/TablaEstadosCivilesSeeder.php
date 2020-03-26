<?php

use Illuminate\Database\Seeder;

class TablaEstadosCivilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('estadosciviles')->truncate();

        $estadosciviles = [
        	['id' =>1,  'name' =>'Soltero(a)',     'created_at' => new DateTime ],
			['id' =>2,  'name' =>'Union Libre',     'created_at' => new DateTime ],
			['id' =>3,  'name' =>'Casado(a)',     'created_at' => new DateTime ],
			['id' =>4,  'name' =>'Divorciado(a)',    'created_at' => new DateTime ],
			['id' =>5,  'name' =>'Viudo(a)',     'created_at' => new DateTime ],
	
          ];

        DB::table('estadosciviles')->insert($estadosciviles);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
