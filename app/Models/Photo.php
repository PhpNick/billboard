<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'card_photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];

    protected $baseDir = 'uploadedPhotos';

    public function card()
    {
        return $this->belongsTo(Card::class);
    } 

    public static function named($name)
    {
        return (new static)->saveAs($name);
    } 

    protected function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;
    }

    public static function uploadPhotos(UploadedFile $file)
    {
        
        $photo = Photo::named($file->getClientOriginalName());

        $photo->move($file);

        Image::make($photo->path)
                ->fit(200)
                ->save($photo->thumbnail_path);

        $photo->save();        

        return $photo->name;
    }

    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);
    }          
}
