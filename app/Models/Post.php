<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    use Sluggable;
    use HasFactory;
    protected $fillable = [
        'category_id', 'photo_id','title', 'body','slug'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function photo(){
        return $this->belongsTo('App\Models\Photo');
    }
    public function category(){
        return $this->belongsTo('App\Models\category');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function sluggable(): array
    {
        return [
            'slug'   => [
            'source' => 'title'
            ]
        ];
    }
}
