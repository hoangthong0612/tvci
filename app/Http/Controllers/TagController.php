<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tags = Tag::paginate(10); // tuỳ chỉnh số lượng
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'metaTitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ], [
            'title.required' => 'Vui lòng nhập tên thẻ.',
            'title.string' => 'Tên thẻ phải là chuỗi ký tự.',
            'title.max' => 'Tên thẻ không được vượt quá 255 ký tự.',
            'metaTitle.string' => 'Meta title phải là chuỗi ký tự.',
            'metaTitle.max' => 'Meta title không được vượt quá 255 ký tự.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',
        ]);

        Tag::create($data);

        return redirect()->route('admin.tags.index')->with('success', 'Thẻ đã được tạo.');
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
        $tag = Tag::findOrFail($id);

        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'metaTitle' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ], [
            'title.required' => 'Vui lòng nhập tên thẻ.',
            'title.string' => 'Tên thẻ phải là chuỗi ký tự.',
            'title.max' => 'Tên thẻ không được vượt quá 255 ký tự.',
            'metaTitle.string' => 'Meta title phải là chuỗi ký tự.',
            'metaTitle.max' => 'Meta title không được vượt quá 255 ký tự.',
            'content.string' => 'Nội dung phải là chuỗi ký tự.',
        ]);
        $tag = Tag::findOrFail($id);
        $tag->update($data);

        return redirect()->route('admin.tags.index')->with('success', 'Thẻ đã được chỉnh sửa.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
