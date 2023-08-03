<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faq';
    protected $fillable = [
        'id_site',
        'id_project',
        'pertanyaan',
        'jawaban',
        'image_url',
        'image_url2',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }

    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'id_project', 'id');
    }
}
