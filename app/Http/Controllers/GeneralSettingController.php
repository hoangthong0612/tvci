<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $setting = GeneralSetting::first();
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $setting = GeneralSetting::first();
        $setting->company = $request->company;
        if ($request->hasFile('logo')) {
            $setting->logo = $this->uploadImage($request->file('logo'), imagePath()['logoIcon']['path']);
        }
        if ($request->hasFile('favicon')) {
            $setting->favicon = $this->uploadImage($request->file('favicon'), imagePath()['favicon']['path'], imagePath()['favicon']['size']);
        }

        $setting->save();
        return redirect()->back()->with('success', 'Chỉnh sửa thành công.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadImage($image, $path, $size = null)
    {


        $thumbnail = uploadImage($image, $path, $size, null, null);

        return $thumbnail;
    }
}
