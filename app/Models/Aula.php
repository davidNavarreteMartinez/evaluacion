<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /** @use HasFactory<\Database\Factories\AulaFactory> */
    use HasFactory;

    protected $fillable = [
        'edificio_id',
        'numero',
        'capacidad',
    ];

    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }
}
