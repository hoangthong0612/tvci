<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    //

    protected $table = 'post';
    use Sluggable;
    protected $fillable = ['title', 'content', 'slug'];
    public function categories()
    {
        return $this->belongsToMany(Post::class, 'post_category', 'categoryId', 'postId');
    }

    public function tags()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tagId', 'postId');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
