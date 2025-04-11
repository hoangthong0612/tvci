<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManager;

use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;


class CKEditorController extends Controller
{
    //
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            // $manager = new ImageManager(new Driver());
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = storage_path('app/public/uploads/' . $filename);
            $manager = new ImageManager(new Driver());
            // Resize hoặc xử lý ảnh tùy ý tại đây
            $image = $manager->read($file);

            $image->save($path);

            $url = asset('storage/uploads/' . $filename);
            return view('uploadCKEditor', [
                'CKEditorFuncNum' => $request->CKEditorFuncNum,
                'data' => [
                    'url' => $url,
                    'message' => "Thành công",
                ],
            ]);
            
            // return response()->json([
            //     'uploaded' => 1,
            //     'fileName' => $filename,
            //     'url' => $url,
            // ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'Không có file']
        ]);
    }
}
