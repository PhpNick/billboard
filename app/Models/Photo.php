<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'card_photos';

    protected $fillable = ['path'];

    protected $baseDir = 'cards/photos';

    protected $baseTempDir = 'cards/photos/tmp';

    public function card()
    {
        return $this->belongsTo(Card::class);
    } 

    public static function fromForm(UploadedFile $file)
    {
        $photo = new static;

        $name = time(). $file->getClientOriginalName();

        $photo->path = $this->baseDir . '/' . $name;

        $file->move($photos->baseDir, $name);

        return $photo;
    } 

    public static function fromTempForm(UploadedFile $file)
    {
        
        $photo = new static;

        $name = time(). $file->getClientOriginalName();

        $photo->path = $photo->baseTempDir . '/' . $name;

        $file->move($photo->baseDir, $name);

        return $name;
    }          
}
