<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Usuario;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = ['nombre'];

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class);
    }
}
