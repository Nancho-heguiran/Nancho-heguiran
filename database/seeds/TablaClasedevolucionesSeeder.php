<?php

use Illuminate\Database\Seeder;

class TablaClasedevolucionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('clasedevoluciones')->truncate();

        $clasedevoluciones = [
            
            ['id' =>1,  'name' =>'A_Cancelada Por Doble Cedulación',     'created_at' => new DateTime ],
            ['id' =>2,  'name' =>'B_Suplantación',     'created_at' => new DateTime ],
            ['id' =>3,  'name' =>'C_Cancelada Por Mala Elaboración',     'created_at' => new DateTime ],
            ['id' =>4,  'name' =>'D_Cancelada Por Muerte',     'created_at' => new DateTime ],
            ['id' =>5,  'name' =>'E_Datos Incoherentes',     'created_at' => new DateTime ],
            ['id' =>6,  'name' =>'F_Datos Incompletos',     'created_at' => new DateTime ],
            ['id' =>7,  'name' =>'G_Falta Firma Del Registrador/Nombre Reseñador',     'created_at' => new DateTime ],
            ['id' =>8,  'name' =>'H_Falta Firma Del Colombiano',     'created_at' => new DateTime ],
            ['id' =>9,  'name' =>'K_Foto No Cumple Con Especificaciones',     'created_at' => new DateTime ],
            ['id' =>10,  'name' =>'L_Huellas Fuera Del Cuadro',     'created_at' => new DateTime ],
            ['id' =>11,  'name' =>'M_Impresiones Trocadas',     'created_at' => new DateTime ],
            ['id' =>12,  'name' =>'N_Mala Calidad De La Reseña',     'created_at' => new DateTime ],
            ['id' =>13,  'name' =>'O_Nuip Mal Asignado',     'created_at' => new DateTime ],
            ['id' =>14,  'name' =>'P_Problema Con Cambio De Datos',     'created_at' => new DateTime ],
            ['id' =>15,  'name' =>'Q_Reseña No Concuerda Con Señales Particulares',     'created_at' => new DateTime ],
            ['id' =>16,  'name' =>'R_Tarjeta En Un Lote Equivocado',     'created_at' => new DateTime ],
            ['id' =>17,  'name' =>'S_Tarjeta Posiblemente Alterada',     'created_at' => new DateTime ],
            ['id' =>18,  'name' =>'T_Tramite Ya Producido (Pv O Ren)',     'created_at' => new DateTime ],
            ['id' =>19,  'name' =>'U_Error Prenist (Huellas Negras, Tomar Huellas En Tinta)',     'created_at' => new DateTime ],
            ['id' =>20,  'name' =>'V_Numero De Preparación Errado',     'created_at' => new DateTime ],
            ['id' =>21,  'name' =>'W_Mala Calidad De La Firma ',     'created_at' => new DateTime ]
			
          ];

        DB::table('clasedevoluciones')->insert($clasedevoluciones);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
