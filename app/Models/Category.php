<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'categories';

    /**
     * Get the posts for the category.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class,'category_post');
    }

    public function formularios()
    {
        return $this->belongsToMany(Formulario::class);
    }
}
