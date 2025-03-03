<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;

    protected $table = 'pregunta';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pregunta'
    ];

    public function formulario()
    {
        return $this->belongsTo(Formularios::class);

    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function respuesta()
    {
        return $this->hasMany(Respuestas::class);
    }
}
