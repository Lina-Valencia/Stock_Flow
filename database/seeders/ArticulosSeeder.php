<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticulosSeeder extends Seeder
{
    public function run(): void
    {
        $electronica     = DB::table('categorias')->where('nombre', 'Electrónica')->value('id');
        $herramientas    = DB::table('categorias')->where('nombre', 'Herramientas')->value('id');
        $mobiliario      = DB::table('categorias')->where('nombre', 'Mobiliario')->value('id');
        $equiposOficina  = DB::table('categorias')->where('nombre', 'Equipos de oficina')->value('id');
        $materialDidact  = DB::table('categorias')->where('nombre', 'Material didáctico')->value('id');

        $articulos = [
            [
                'id'           => Str::uuid(),
                'nombre'       => 'Laptop Dell XPS 15',
                'foto'         => 'laptop_dell.jpg',
                'estado'       => 'disponible',
                'ubicacion'    => 'Bodega A - Estante 1',
                'categoria_id' => $electronica,
                'activo'       => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => Str::uuid(),
                'nombre'       => 'Proyector Epson X41+',
                'foto'         => 'proyector_epson.jpg',
                'estado'       => 'disponible',
                'ubicacion'    => 'Bodega A - Estante 2',
                'categoria_id' => $electronica,
                'activo'       => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => Str::uuid(),
                'nombre'       => 'Taladro Bosch 800W',
                'foto'         => 'taladro_bosch.jpg',
                'estado'       => 'en_prestamo',
                'ubicacion'    => 'Bodega B - Estante 3',
                'categoria_id' => $herramientas,
                'activo'       => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => Str::uuid(),
                'nombre'       => 'Silla ergonómica',
                'foto'         => null,
                'estado'       => 'disponible',
                'ubicacion'    => 'Almacén principal',
                'categoria_id' => $mobiliario,
                'activo'       => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => Str::uuid(),
                'nombre'       => 'Impresora HP LaserJet',
                'foto'         => 'impresora_hp.jpg',
                'estado'       => 'mantenimiento',
                'ubicacion'    => 'Bodega A - Estante 4',
                'categoria_id' => $equiposOficina,
                'activo'       => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => Str::uuid(),
                'nombre'       => 'Kit de marcadores didácticos',
                'foto'         => null,
                'estado'       => 'disponible',
                'ubicacion'    => 'Bodega C - Estante 1',
                'categoria_id' => $materialDidact,
                'activo'       => true,
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ];

        DB::table('articulos')->insert($articulos);
    }
}
