<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;

    protected $table = 'respuestas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'respuesta',
        'correcta',
        'pregunta_id'
    ];

    public function preguntas()
    {
        return $this->belongsTo(Preguntas::class, 'pregunta_id');
    }
}
