<?php

use Illuminate\Database\Seeder;

class TablaTipotramitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('tipotramites')->truncate();

        $tipotramites = [

            ['id' =>1,  'name' =>' DUPLICADOS CC', 'clasetramite_id' => 1,   'created_at' => new DateTime ],
            ['id' =>2,  'name' =>' PRIMERA VEZ CC', 'clasetramite_id' => 1,   'created_at' => new DateTime ],
            ['id' =>3,  'name' =>' RECTIFICACION CC', 'clasetramite_id' => 1,   'created_at' => new DateTime ],
            ['id' =>4,  'name' =>' RENOVACION', 'clasetramite_id' => 1,   'created_at' => new DateTime ],
            ['id' =>5,  'name' =>'NACIMIENTO INSCRIPCION', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>6,  'name' =>'NACIMIENTO COPIA O CERTIFICADO', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>7,  'name' =>'MATRIMONIO COPIA O CERTIFICADO', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>8,  'name' =>'DEFUNCION INSCRIPCION', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>9,  'name' =>'NACIMIENTO REEMPLAZO', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>10,  'name' =>'DEFUNCION COPIA O CERTIFICADO', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>11,  'name' =>'DEFUNCION REEMPLAZO', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>12,  'name' =>'NACIMIENTO ANULACION', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>13,  'name' =>'MATRIMONIO ANULACION', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>14,  'name' =>'DEFUNCION ANULACION', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>15,  'name' =>'MATRIMONIO INSCRIPCION', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>16,  'name' =>'MATRIMONIO REEMPLAZO', 'clasetramite_id' => 2,   'created_at' => new DateTime ],
            ['id' =>17,  'name' =>' PRIMERA VEZ TI -7 -17 AÑOS', 'clasetramite_id' => 3,   'created_at' => new DateTime ],
            ['id' =>18,  'name' =>' DUPLICADOS TI 7 - 17 AÑOS', 'clasetramite_id' => 3,   'created_at' => new DateTime ],
            ['id' =>19,  'name' =>' RENOVACION', 'clasetramite_id' => 3,   'created_at' => new DateTime ],
            ['id' =>20,  'name' =>' RECTIFICACION TI 7 - 17 AÑOS', 'clasetramite_id' => 3,   'created_at' => new DateTime ]

            
          ];

        DB::table('tipotramites')->insert($tipotramites);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
