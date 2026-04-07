<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrestamosSeeder extends Seeder
{
    public function run(): void
    {
        $solicitante1 = DB::table('usuarios')->where('email', 'solicitante@stockflow.com')->value('id');
        $solicitante2 = DB::table('usuarios')->where('email', 'maria.garcia@stockflow.com')->value('id');
        $custodio1    = DB::table('usuarios')->where('email', 'custodio@stockflow.com')->value('id');

        $laptop    = DB::table('articulos')->where('nombre', 'Laptop Dell XPS 15')->value('id');
        $proyector = DB::table('articulos')->where('nombre', 'Proyector Epson X41+')->value('id');
        $taladro   = DB::table('articulos')->where('nombre', 'Taladro Bosch 800W')->value('id');
        $silla     = DB::table('articulos')->where('nombre', 'Silla ergonómica')->value('id');

        $prestamos = [
            // Préstamo activo (taladro en préstamo)
            [
                'id'               => Str::uuid(),
                'articulo_id'      => $taladro,
                'solicitante_id'   => $solicitante1,
                'custodio_id'      => $custodio1,
                'estado'           => 'entregado',
                'fecha_solicitud'  => now()->subDays(5),
                'fecha_entrega'    => now()->subDays(4),
                'fecha_limite'     => now()->addDays(3),
                'fecha_devolucion' => null,
                'estado_devolucion'=> null,
                'created_at'       => now()->subDays(5),
                'updated_at'       => now()->subDays(4),
            ],
            // Préstamo devuelto en buen estado
            [
                'id'               => Str::uuid(),
                'articulo_id'      => $laptop,
                'solicitante_id'   => $solicitante2,
                'custodio_id'      => $custodio1,
                'estado'           => 'devuelto',
                'fecha_solicitud'  => now()->subDays(15),
                'fecha_entrega'    => now()->subDays(14),
                'fecha_limite'     => now()->subDays(7),
                'fecha_devolucion' => now()->subDays(8),
                'estado_devolucion'=> 'bueno',
                'created_at'       => now()->subDays(15),
                'updated_at'       => now()->subDays(8),
            ],
            // Préstamo devuelto con daño
            [
                'id'               => Str::uuid(),
                'articulo_id'      => $proyector,
                'solicitante_id'   => $solicitante1,
                'custodio_id'      => $custodio1,
                'estado'           => 'devuelto',
                'fecha_solicitud'  => now()->subDays(30),
                'fecha_entrega'    => now()->subDays(29),
                'fecha_limite'     => now()->subDays(22),
                'fecha_devolucion' => now()->subDays(20),
                'estado_devolucion'=> 'aprobado',
                'created_at'       => now()->subDays(30),
                'updated_at'       => now()->subDays(20),
            ],
            // Solicitud pendiente (aún no entregado)
            [
                'id'               => Str::uuid(),
                'articulo_id'      => $silla,
                'solicitante_id'   => $solicitante2,
                'custodio_id'      => $custodio1,
                'estado'           => 'pendiente',
                'fecha_solicitud'  => now()->subHours(3),
                'fecha_entrega'    => null,
                'fecha_limite'     => now()->addDays(7),
                'fecha_devolucion' => null,
                'estado_devolucion'=> null,
                'created_at'       => now()->subHours(3),
                'updated_at'       => now()->subHours(3),
            ],
        ];

        DB::table('prestamos')->insert($prestamos);
    }
}

//(pendiente,aprobado,entregado,devuelto,rechazado, cancelado) los diferentes estados del préstamo
