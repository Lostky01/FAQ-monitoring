<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faq';
    protected $fillable = [
        'id_site',
        'pertanyaan',
        'jawaban',
        'image_url',
        'image_url2',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
