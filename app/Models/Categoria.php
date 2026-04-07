<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Articulo;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre'];

    public function articulos(): HasMany
    {
        return $this->hasMany(Articulo::class, 'categoria_id');
    }
}
