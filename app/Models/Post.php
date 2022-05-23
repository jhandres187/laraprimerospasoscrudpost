<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'posted',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);//un post pertenece a una categoria != no es igual a una categoria tiene muchas post has many 'category_id' no es necesario colocarla
        
    }
}
