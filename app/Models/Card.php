<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'city',
        'street',
        'zip',
        'price',
        'description'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public static function locatedAt($zip, $street)
    {
        $street = translit_reverse($street);
        $zip = translit_reverse($zip);

        return static::where(compact('zip', 'street'))->first();
    }

    public function getPriceAttribute($price)
    {
        return number_format($price, 2, ',', ' ') . ' руб.';
    }    
}