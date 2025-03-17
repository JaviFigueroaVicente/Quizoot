<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    protected $table = 'preguntas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'pregunta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuestas::class);
    }

    //Crear relacion con formularios para poder crear la tabla intermedia
    public function formularios()
    {
        return $this->belongsToMany(Formularios::class, 'formularios_preguntas', 'pregunta_id', 'formulario_id');
    }
}
