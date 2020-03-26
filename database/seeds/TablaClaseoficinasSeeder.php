<?php

use Illuminate\Database\Seeder;

class TablaClaseoficinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('claseoficinas')->truncate();

        $claseoficinas = [

          ['id' => 1, 'name' => 'Delegacion Departamental','created_at' => new DateTime ],
          ['id' => 2, 'name' => 'Registraduria Distrital','created_at' => new DateTime ],
          ['id' => 3, 'name' => 'Registraduria Especial','created_at' => new DateTime ],
          ['id' => 4, 'name' => 'Registraduria Auxiliar','created_at' => new DateTime ],
          ['id' => 5, 'name' => 'Registraduria Municipal','created_at' => new DateTime ],
          ['id' => 6, 'name' => 'Notaria','created_at' => new DateTime ],
          ['id' => 7, 'name' => 'Opadi','created_at' => new DateTime ]

          ];

        DB::table('claseoficinas')->insert($claseoficinas);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
