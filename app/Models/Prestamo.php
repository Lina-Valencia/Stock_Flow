<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Usuario;
use App\Models\Articulo;

class Prestamo extends Model
{
    protected $table = 'prestamos';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['articulo_id','solicitante_id','custodio_id','estado','fecha_solicitud','fecha_entrega','fecha_limite','fecha_devolucion','estado_devolucion',];

    protected $casts = [
    'fecha_solicitud'  => 'datetime',
    'fecha_entrega'    => 'datetime',
    'fecha_limite'     => 'datetime',
    'fecha_devolucion' => 'datetime',
    ];


    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'solicitante_id');
    }

    public function custodio(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'custodio_id');
    }

    public function articulos(): BelongsTo
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }


}
