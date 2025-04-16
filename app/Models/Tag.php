<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    //
    use Sluggable;
    protected $guarded = []; // Cho phép fill tất cả các trường

    protected $table = 'tag';
    public function posts()
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
