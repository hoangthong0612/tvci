<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    //
    use Sluggable;
    protected $fillable = [
        'title',
        // thêm các cột khác nếu có
    ];
    protected $table = 'tag';
    public function posts()
    {
        return $this->belongsToMany(Category::class, 'post_tag', 'postId', 'tagId');
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
