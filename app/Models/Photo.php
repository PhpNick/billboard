<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'card_photos';

    protected $fillable = ['photo'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }    
}
