<?php

use Illuminate\Database\Seeder;

class TablaParentescosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('parentescos')->truncate();

        $parentescos = [
        	
        	['id' => 1, 'name' => 'Abuelo(a)',     'created_at' => new DateTime   ],
        	['id' => 2, 'name' => 'Bisabuelo(a)',     'created_at' => new DateTime   ],
        	['id' => 3, 'name' => 'Biznieto(a)',     'created_at' => new DateTime   ],
        	['id' => 4, 'name' => 'Conyuge',     'created_at' => new DateTime   ],
       		['id' => 5, 'name' => 'Ccuñado(a)',   'created_at' => new DateTime   ],
       		['id' => 6, 'name' => 'Hermano(a)',     'created_at' => new DateTime   ],
        	['id' => 7, 'name' => 'Hijo(a)',     'created_at' => new DateTime   ],
        	['id' => 8, 'name' => 'Madre',     'created_at' => new DateTime   ],
        	['id' => 9, 'name' => 'Nieto(a)',     'created_at' => new DateTime   ],
       		['id' => 10, 'name' => 'Nuera(o)',   'created_at' => new DateTime   ],
       		['id' => 11, 'name' => 'Padre',     'created_at' => new DateTime   ],
        	['id' => 12, 'name' => 'Primo Hermano(a)',     'created_at' => new DateTime   ],
        	['id' => 13, 'name' => 'Sobrino(a)',     'created_at' => new DateTime   ],
        	['id' => 14, 'name' => 'Suegro(a)',     'created_at' => new DateTime   ],
       		['id' => 15, 'name' => 'Tio(a)',   'created_at' => new DateTime   ],
       		['id' => 16, 'name' => 'Yerno(a)',   'created_at' => new DateTime   ],
       		['id' => 17, 'name' => 'Otro',     'created_at' => new DateTime   ]
        	
          ];

        DB::table('parentescos')->insert($parentescos);
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
    }
}
