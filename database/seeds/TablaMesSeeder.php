<?php

use Illuminate\Database\Seeder;

class TablaMesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('mes')->truncate();

        $mes = [
        	['id' =>1,  'name' =>'Enero',     'created_at' => new DateTime ],
			['id' =>2,  'name' =>'Febrero',     'created_at' => new DateTime ],
			['id' =>3,  'name' =>'Marzo',     'created_at' => new DateTime ],
			['id' =>4,  'name' =>'Abril',     'created_at' => new DateTime ],
			['id' =>5,  'name' =>'Mayo',     'created_at' => new DateTime ],
			['id' =>6,  'name' =>'Junio',     'created_at' => new DateTime ],
			['id' =>7,  'name' =>'Julio',     'created_at' => new DateTime ],
			['id' =>8,  'name' =>'Agosto',     'created_at' => new DateTime ],
			['id' =>9,  'name' =>'Septiembre',     'created_at' => new DateTime ],
			['id' =>10,  'name' =>'Octubre',     'created_at' => new DateTime ],
			['id' =>11,  'name' =>'Noviembre',     'created_at' => new DateTime ],
			['id' =>12,  'name' =>'Diciembre',     'created_at' => new DateTime ],
          ];

        DB::table('mes')->insert($mes);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
