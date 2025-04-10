<?php

namespace App\Http\Controllers;

use App\Models\Category;
use BcMath\Number;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parentId')
            ->with('children') // lồng children không phân trang
            ->paginate(10); // tuỳ chỉnh số lượng
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull(columns: 'parentId')->with('children')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'metaTitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'parentId' => 'nullable|exists:category,id',
        ], [
            'title.required' => 'Vui lòng nhập tên danh mục.',
            'title.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'title.max' => 'Tên danh mục không được vượt quá 255 ký tự.',

            'metaTitle.string' => 'Meta title phải là chuỗi ký tự.',
            'metaTitle.max' => 'Meta title không được vượt quá 255 ký tự.',

            'content.string' => 'Nội dung phải là chuỗi ký tự.',

            'parentId.exists' => 'Danh mục cha không hợp lệ.',
        ]);

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được tạo.');
    }

    public function show(Category $category)
    {
        $category->load('children', 'posts');
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('parentId')->with('children')->where('id', '!=', $category->id)->get();

        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'metaTitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'parentId' => 'nullable|exists:category,id',
        ], [
            'title.required' => 'Vui lòng nhập tên danh mục.',
            'title.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'title.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'metaTitle.string' => 'Meta title phải là chuỗi ký tự.',
            'metaTitle.max' => 'Meta title không được vượt quá 255 ký tự.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',
            'parentId.exists' => 'Danh mục cha không hợp lệ.',
        ]);

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật.');
    }

    public function destroy(Category $category)
    {
        // Optional: chuyển con về root hoặc xóa hết nếu có children
        $category->children()->update(['parentId' => null]);
        $category->posts()->detach();
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa.');
    }
}
