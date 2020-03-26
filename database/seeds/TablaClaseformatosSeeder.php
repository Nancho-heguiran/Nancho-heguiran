<?php

use Illuminate\Database\Seeder;

class TablaClaseformatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('claseformatos')->truncate();

        $claseformatos = [

            ['id' =>1,  'name' =>'Alfabética',     'created_at' => new DateTime ],
            ['id' =>2,  'name' =>'Alfabética Y Contraseña',     'created_at' => new DateTime ],
            ['id' =>3,  'name' =>'Alfabética Y Decadactilar',     'created_at' => new DateTime ],
            ['id' =>4,  'name' =>'Contraseña ',     'created_at' => new DateTime ],
            ['id' =>5,  'name' =>'Contraseña Y Decadactilar',     'created_at' => new DateTime ],
            ['id' =>6,  'name' =>'Decadactilar',     'created_at' => new DateTime ],
            ['id' =>7,  'name' =>'Formato Completo',     'created_at' => new DateTime ],
			
          ];

        DB::table('claseformatos')->insert($claseformatos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
