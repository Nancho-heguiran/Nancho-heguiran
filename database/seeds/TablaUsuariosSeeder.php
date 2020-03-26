<?php

use Illuminate\Database\Seeder;

class TablaUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('usuarios')->truncate();

        $usuarios = [
            ['id' =>  1, 'cedula' => 79686404, 'name' => 'Hernan Enrique Guiran Castellanos', 'login' => 'heguiran', 'email' => 'heguiran@gmail.com', 'password' => bcrypt('kike'), 'direccion' => 'Arboleda Campestre Manzana 22d Casa 39', 'movil' => '3206227776', 'estado_id' => 1, 'departamento_id' => 31, 'municipio_id' => 315, 'tipousuario_id' => 1, 'claseoficina_id' => 5, 'oficina_id' => 97, 'created_at' => new DateTime],
            ['id' =>  2, 'cedula' => 41423619, 'name' => 'Rosalba Castellanos de Guiran', 'login' => 'rosita', 'email' => 'rosita@gmail.com', 'password' => bcrypt('123'), 'direccion' => 'Arboleda Campestre Manzana 22d Casa 39', 'movil' => '3102478946', 'estado_id' => 1, 'departamento_id' => 11, 'municipio_id' => 125, 'tipousuario_id' => 1, 'claseoficina_id' => 2, 'oficina_id' => 1, 'created_at' => new DateTime],
          ];

        DB::table('usuarios')->insert($usuarios);
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); 
    }
}
