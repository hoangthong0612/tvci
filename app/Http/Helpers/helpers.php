<?php
use App\Models\Category;

class CategoryHelper
{
    public static function renderCategoryOptions($categories, $prefix = '', $selectedId = null)
    {
        $html = '';
        foreach ($categories as $category) {
            $selected = $selectedId == $category->id ? 'selected' : '';
            $html .= "<option value='{$category->id}' {$selected}>{$prefix}{$category->title}</option>";

            if ($category->children && $category->children->count()) {
                $html .= self::renderCategoryOptions($category->children, $prefix . '— ', $selectedId);
            }
        }

        return $html;
    }
}

?>