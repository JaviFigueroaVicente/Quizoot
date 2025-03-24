<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Formularios extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'formularios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'categoria_id'
    ];

    // Recupera el usuario que ha creado el formulario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorias()
    {
        return $this->belongsTo(Category::class);
    }

    //Crear relación con preguntas para poder crear la tabla intermedia
    public function preguntas()
    {
        return $this->belongsToMany(Preguntas::class, 'formularios_preguntas', 'formulario_id', 'pregunta_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('formularios') // Nombre de la colección
        ->useDisk('public') // Usar el disco adecuado
        ->useFallbackUrl('/images/placeholder.jpg')
            ->useFallbackPath(public_path('/images/placeholder.jpg'));
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if (env('RESIZE_IMAGE') === true) {

            $this->addMediaConversion('resized-image')
                ->width(env('IMAGE_WIDTH', 300))
                ->height(env('IMAGE_HEIGHT', 300));
        }
    }
}
