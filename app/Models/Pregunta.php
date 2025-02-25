<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'pregunta';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pregunta',
        'formulario_id'
    ];

    public function formulario()
    {
        return $this->belongsTo(Formulario::class);

    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
