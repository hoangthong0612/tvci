<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'parentId', 'slug'];
    //
    protected $table = 'category';
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parentId');
    }

    // Quan hệ: danh mục con
    public function children()
    {
        return $this->hasMany(Category::class, 'parentId');
    }

    // Quan hệ: nhiều bài viết
    public function posts()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'postId', 'categoryId');
    }

    // Hàm đệ quy lấy tất cả ID con (kể cả chính nó)
    public static function getAllChildIds($category)
    {
        $ids = collect([$category->id]);

        foreach ($category->children as $child) {
            $ids = $ids->merge(self::getAllChildIds($child));
        }

        return $ids;
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
