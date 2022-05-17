<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'card_photos';

    protected $fillable = ['path'];

    protected $baseDir = 'uploadedPhotos';

    public function card()
    {
        return $this->belongsTo(Card::class);
    } 

    public static function fromForm($file)
    {
        $photo = new static;

        $photo->path = $photo->baseDir . '/' . $file;

        return $photo;
    } 

    public static function uploadPhotos(UploadedFile $file)
    {
        
        $photo = new static;

        $name = time() . $file->getClientOriginalName();

        $file->move($photo->baseDir, $name);

        return $name;
    }          
}
