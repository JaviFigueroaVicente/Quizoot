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
        'description'
    ];

    // Recupera el usuario que ha creado el formulario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pregunta(){
        return $this->hasMany(Preguntas::class);
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
