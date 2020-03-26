<?php

use Illuminate\Database\Seeder;

class TablaClasetramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('clasetramites')->truncate();

        $clasetramites = [

            ['id' =>1,  'name' =>'CEDULA DE CIUDADANIA',   'created_at' => new DateTime ],
            ['id' =>2,  'name' =>'REGISTRO CIVIL',    'created_at' => new DateTime ],
            ['id' =>3,  'name' =>'TARJETA DE IDENTIDAD DE 7 A 17',      'created_at' => new DateTime ]
			
          ];

        DB::table('clasetramites')->insert($clasetramites);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
