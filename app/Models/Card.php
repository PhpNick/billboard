<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Card extends Model
{
    use HasFactory, Favoriteable;

    protected $fillable = [
        'title',
        'region',
        'city',
        'street',
        'zip',
        'price',
        'description',
        'user_id',
        'category_id'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }    

    public function getPriceAttribute($price)
    {
        return number_format($price, 2, ',', ' ') . '';
    } 

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public static function getCards(Category $category, User $user)
    {
        if ($category->exists) {
        return static::where('category_id', $category->id)->get();
        }

        if ($user->exists) {
        return static::where('user_id', $user->id)->get();
        }        
        
        return static::all();
    }

    public function firstPhotoPath()
    {
        if($this->photos()->first())
            return '/' . $this->photos()->firstOrFail()->thumbnail_path;
        return "/img/no-image-available.jpg";
    }            
}
