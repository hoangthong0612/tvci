<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menus = Menu::whereNull('parent_id')
            ->with('children') // lồng children không phân trang
            ->paginate(10); // tuỳ chỉnh số lượng
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $posts = Post::all();
        $categories = Category::whereNull('parentId')->with('children')->get();
        $tags = Tag::all();
        $categoryOptions = $this->buildCategoryOptions($categories);
        $menus = Menu::whereNull(columns: 'parent_id')->with('children')->get();
        return view('admin.menu.create', compact('categoryOptions', 'posts', 'tags', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $menu = Menu::create([
            'name' => $request->name,
            'path' => $request->path,
            'parent_id' => $request->parent_id,

        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Thêm menu thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $posts = Post::all();
        $categories = Category::whereNull('parentId')->with('children')->get();
        $tags = Tag::all();
        $categoryOptions = $this->buildCategoryOptions($categories);
        $menus = Menu::whereNull(columns: 'parent_id')->with('children')->get();
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('categoryOptions', 'posts', 'tags', 'menus', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $menu = Menu::findOrFail($id);
        $menu->update(
            [
                'name' => $request->name,
                'path' => $request->path,
                'parent_id' => $request->parent_id,

            ]
        );

        return redirect()->route('admin.menu.index')->with('success', 'Sửa menu thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function buildCategoryOptions($categories, $prefix = '')
    {
        $result = [];

        foreach ($categories as $category) {
            $result[$category->id] = ['title' => $prefix . $category->title, 'slug' => $category->slug];

            if ($category->children->isNotEmpty()) {
                $childOptions = $this->buildCategoryOptions($category->children, $prefix . '-- ');
                $result = $result + $childOptions; // giữ key là ID
            }
        }

        return $result;
    }
}
