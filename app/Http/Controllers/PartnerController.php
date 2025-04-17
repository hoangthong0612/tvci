<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $partners = Partner::paginate(10);
        return view('admin.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $this->uploadThumbnail($request->file('image'));
        }

        Partner::create([
            'name' => $request->name ?? '',
            'image' => $image,
            'description' => $request->description
        ]);
        return redirect()->route('admin.partners.index')->with('success', 'Thêm đối tác - khách hàng thành công.');

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
        $partner = Partner::findOrFail($id);
        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $partner = Partner::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $this->uploadThumbnail($request->file('image'), $partner->image);
        }

        $partner->update([
            'name' => $request->name ?? '',
            'image' => $image,
            'description' => $request->description
        ]);
        return redirect()->route('admin.partners.index')->with('success', 'Sửa đối tác - khách hàng thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $partner = Partner::findOrFail($id);
        removeFile(imagePath()['partners']['path'] . '/' . $partner->image);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Xóa đối tác khách hàng thành công.');
    }

    public function uploadThumbnail($image, $old = null)
    {

        $path = imagePath()['partners']['path'];
        $thumbnail = uploadImage($image, $path, null, $old, null);

        return $thumbnail;
    }
}
