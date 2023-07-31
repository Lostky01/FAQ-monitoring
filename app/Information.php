<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Information extends Model
{
    protected $table = 'FAQs';
    protected $fillable = [
        'project_id',
        'domain_id',
        'title',
        'description',
        'date',
        'image_url',
        'image_url2',
        'image_url3',
        'image_url4',
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}

