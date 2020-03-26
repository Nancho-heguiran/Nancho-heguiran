<?php

use Illuminate\Database\Seeder;

class TablaDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('departamentos')->truncate();

        $departamentos = [
        	['id' =>1,  'name' =>'Antioquia',     'created_at' => new DateTime ],
			['id' =>3,  'name' =>'Atlantico',     'created_at' => new DateTime ],
			['id' =>5,  'name' =>'Boli­var',     'created_at' => new DateTime ],
			['id' =>7,  'name' =>'Boyaca',    'created_at' => new DateTime ],
			['id' =>9,  'name' =>'Caldas',     'created_at' => new DateTime ],
			['id' =>11, 'name' =>'Cauca',     'created_at' => new DateTime ],
			['id' =>12, 'name' =>'Cesar',     'created_at' => new DateTime ],
			['id' =>13, 'name' =>'Cordoba',     'created_at' => new DateTime ],
			['id' =>15, 'name' =>'Cundinamarca',     'created_at' => new DateTime ],
			['id' =>16, 'name' =>'Bogota D.C.',     'created_at' => new DateTime ],
			['id' =>17, 'name' =>'Choco',     'created_at' => new DateTime ],
			['id' =>19, 'name' =>'Huila',     'created_at' => new DateTime ],
			['id' =>21, 'name' =>'Magdalena',     'created_at' => new DateTime ],
			['id' =>23, 'name' =>'Nariño',     'created_at' => new DateTime ],
			['id' =>24, 'name' =>'Risaralda',     'created_at' => new DateTime ],
			['id' =>25, 'name' =>'Norte de Santander',     'created_at' => new DateTime ],
			['id' =>26, 'name' =>'Quindio',     'created_at' => new DateTime ],
			['id' =>27, 'name' =>'Santander',     'created_at' => new DateTime ],
			['id' =>28, 'name' =>'Sucre',     'created_at' => new DateTime ],
			['id' =>29, 'name' =>'Tolima',     'created_at' => new DateTime ],
			['id' =>31, 'name' =>'Valle',     'created_at' => new DateTime ],
			['id' =>40, 'name' =>'Arauca',     'created_at' => new DateTime ],
			['id' =>44, 'name' =>'Caqueta',     'created_at' => new DateTime ],
			['id' =>46, 'name' =>'Casanare',     'created_at' => new DateTime ],
			['id' =>48, 'name' =>'La Guajira',     'created_at' => new DateTime ],
			['id' =>50, 'name' =>'Guaini­a',     'created_at' => new DateTime ],
			['id' =>52, 'name' =>'Meta',     'created_at' => new DateTime ],
			['id' =>54, 'name' =>'Guaviare',     'created_at' => new DateTime ],
			['id' =>56, 'name' =>'San Andres',     'created_at' => new DateTime ],
			['id' =>60, 'name' =>'Amazonas',     'created_at' => new DateTime ],
			['id' =>64, 'name' =>'Putumayo',     'created_at' => new DateTime ],
			['id' =>68, 'name' =>'Vaupes',     'created_at' => new DateTime ],
			['id' =>72, 'name' =>'Vichada',     'created_at' => new DateTime ],
			['id' =>88, 'name' =>'Consulados',     'created_at' => new DateTime ],
          ];

        DB::table('departamentos')->insert($departamentos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
