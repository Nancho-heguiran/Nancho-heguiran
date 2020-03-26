<?php

use Illuminate\Database\Seeder;

class TablaTiposusuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('tipousuarios')->truncate();

        $tipousuarios = [
        	
            ['id' => 1, 'name' => 'Administrador', 'created_at' => new DateTime ],
        	['id' => 2, 'name' => 'Talento Humano', 'created_at' => new DateTime ],
        	['id' => 3, 'name' => 'Nomina', 'created_at' => new DateTime ],
        	['id' => 4, 'name' => 'Informes', 'created_at' => new DateTime ],
        	['id' => 5, 'name' => 'Registradores', 'created_at' => new DateTime ],
        	['id' => 6, 'name' => 'Acopio', 'created_at' => new DateTime ],
        	['id' => 7, 'name' => 'Almacen', 'created_at' => new DateTime ],
             ['id' => 8, 'name' => 'Alimentadores', 'created_at' => new DateTime ],
             ['id' => 9, 'name' => 'Estadistica', 'created_at' => new DateTime ]


            ];

        DB::table('tipousuarios')->insert($tipousuarios);
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 

    }
}
