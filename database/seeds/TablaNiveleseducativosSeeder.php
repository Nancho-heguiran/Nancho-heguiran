<?php

use Illuminate\Database\Seeder;

class TablaNiveleseducativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('niveleseducativos')->truncate();

        $niveleseducativos = [

        ['id' => 1, 'name' => 'Bachiller',     'created_at' => new DateTime ],
        ['id' => 2, 'name' => 'Tecnico',     'created_at' => new DateTime ],
        ['id' => 3, 'name' => 'Tecnologicos',     'created_at' => new DateTime ],
        ['id' => 4, 'name' => 'Profesionales',     'created_at' => new DateTime ],
        ['id' => 5, 'name' => 'Especializaciones',   'created_at' => new DateTime ],
        ['id' => 6, 'name' => 'Maestrias',   'created_at' => new DateTime ]
			
        ];

        DB::table('niveleseducativos')->insert($niveleseducativos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
