<?php

use Illuminate\Database\Seeder;

class TablaClaseformasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('claseformas')->truncate();

        $claseformas = [

        	['id' =>1,  'name' =>'Booking',     'created_at' => new DateTime ],
            ['id' =>2,  'name' =>'Papel',     'created_at' => new DateTime ],
            ['id' =>3,  'name' =>'Web',     'created_at' => new DateTime ],
            ['id' =>4,  'name' =>'Copias',     'created_at' => new DateTime ]
			
          ];

        DB::table('claseformas')->insert($claseformas);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
