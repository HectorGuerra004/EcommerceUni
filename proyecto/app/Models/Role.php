<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Campos que pueden ser asignados masivamente
     */
    protected $fillable = ['nombre'];

    /**
     * Relación muchos-a-muchos con el modelo User
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}