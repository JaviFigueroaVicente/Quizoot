<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Formulario extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'total_preguntas',
        'user_id',
        'description'
    ];

    // Recupera el usuario que ha creado el formulario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/placeholder.jpg') // URL de imagen por defecto
            ->useFallbackPath(public_path('/images/placeholder.jpg')); // Ruta local de la imagen por defecto
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
