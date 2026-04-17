<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['id' => Str::uuid(), 'nombre' => 'Electrónica'],
            ['id' => Str::uuid(), 'nombre' => 'Herramientas'],
            ['id' => Str::uuid(), 'nombre' => 'Mobiliario'],
            ['id' => Str::uuid(), 'nombre' => 'Equipos de oficina'],
            ['id' => Str::uuid(), 'nombre' => 'Material didáctico'],
        ];

        DB::table('categorias')->insert($categorias);
    }
}
