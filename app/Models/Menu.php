<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $guarded = []; // Cho phép fill tất cả các trường

    //
    protected $table = 'menus';

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    // Quan hệ: danh mục con
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('created_at');
    }

    public static function getAllChildIds($menu)
    {
        $ids = collect([$menu->id]);

        foreach ($menu->children as $child) {
            $ids = $ids->merge(self::getAllChildIds($child));
        }

        return $ids;
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive')->orderBy('created_at');
    }
}
