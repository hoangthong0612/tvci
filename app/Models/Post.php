<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    //

    protected $table = 'post';
    use Sluggable;
    protected $guarded = [];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'postId', 'categoryId');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'postId', 'tagId');
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
