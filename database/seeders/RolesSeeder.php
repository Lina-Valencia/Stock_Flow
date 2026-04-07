<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['id' => Str::uuid(), 'nombre' => 'Administrador'],
            ['id' => Str::uuid(), 'nombre' => 'Custodio'],
            ['id' => Str::uuid(), 'nombre' => 'Solicitante'],
        ];

        DB::table('roles')->insert($roles);
    }
}
