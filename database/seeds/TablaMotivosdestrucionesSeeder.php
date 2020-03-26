<?php

use Illuminate\Database\Seeder;

class TablaMotivosdestrucionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('motivosdestrucciones')->truncate();

        $motivosdestrucciones = [

            ['id' =>1,  'name' =>'Anulación De Material Por Error En Preparación', 'created_at' => new DateTime ],
            ['id' =>2,  'name' =>'Atasco De Papel', 'created_at' => new DateTime ],
            ['id' =>3,  'name' =>'Fallo De Impresora', 'created_at' => new DateTime ],
            ['id' =>4,  'name' =>'Mala Calidad En La Toma De La Firma', 'created_at' => new DateTime ],
            ['id' =>5,  'name' =>'Mala Calidad En La Toma De La Reseña', 'created_at' => new DateTime ],
            ['id' =>6,  'name' =>'Mala Impresión', 'created_at' => new DateTime ],
            ['id' =>7,  'name' =>'Cumplido Los 8 Meses De Custodia', 'created_at' => new DateTime ],
			
          ];

        DB::table('motivosdestrucciones')->insert($motivosdestrucciones);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
