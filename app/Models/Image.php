<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image_url'];

    // Define the relationship with the Information model
    public function information()
    {
        return $this->belongsTo(Information::class);
    }
}
