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
        'pregunta'
    ];

    public function formulario()
    {
        return $this->belongsTo(Formulario::class);

    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function respuesta()
    {
        return $this->hasMany(Respuesta::class);
    }
}
