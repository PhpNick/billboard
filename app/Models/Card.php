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
}
