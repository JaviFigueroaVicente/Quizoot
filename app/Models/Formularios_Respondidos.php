<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formularios_Respondidos extends Model
{
    use HasFactory;

    protected $table = 'formularios_respondidos';

    public $incrementing = false;
    protected $primaryKey = ['user_id', 'formulario_id'];
    protected $fillable = [
        'user_id',
        'formulario_id',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formularios()
    {
        return $this->belongsTo(Formularios::class);
    }
}
