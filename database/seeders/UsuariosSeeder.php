<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        $adminRolId  = DB::table('roles')->where('nombre', 'Administrador')->value('id');
        $custodioRolId = DB::table('roles')->where('nombre', 'Custodio')->value('id');
        $solicitanteRolId = DB::table('roles')->where('nombre', 'Solicitante')->value('id');

        $usuarios = [
            [
                'id'            => '1',
                'nombre'        => 'Carlos Administrador',
                'email'         => 'admin@stockflow.com',
                'password' => Hash::make('password123'),
                'contacto'      => '3001234567',
                'rol_id'        => $adminRolId,
                'activo'        => true,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => '2',
                'nombre'        => 'Laura Custodio',
                'email'         => 'custodio@stockflow.com',
                'password' => Hash::make('password123'),
                'contacto'      => '3109876543',
                'rol_id'        => $custodioRolId,
                'activo'        => true,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => '3',
                'nombre'        => 'Andrés Solicitante',
                'email'         => 'solicitante@stockflow.com',
                'password' => Hash::make('password123'),
                'contacto'      => '3155554433',
                'rol_id'        => $solicitanteRolId,
                'activo'        => true,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => '4',
                'nombre'        => 'María García',
                'email'         => 'maria.garcia@stockflow.com',
                'password' => Hash::make('password123'),
                'contacto'      => '3207778899',
                'rol_id'        => $solicitanteRolId,
                'activo'        => true,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => '5',
                'nombre'        => 'Juan Pérez',
                'email'         => 'juan.perez@stockflow.com',
                'password' => Hash::make('password123'),
                'contacto'      => null,
                'rol_id'        => $custodioRolId,
                'activo'        => false,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        DB::table('usuarios')->insert($usuarios);
    }
}
