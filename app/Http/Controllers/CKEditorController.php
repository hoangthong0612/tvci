<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;


class CKEditorController extends Controller
{
    //
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // Tính hash của nội dung ảnh upload
            $uploadHash = md5_file($file->getRealPath());
            $extension = $file->getClientOriginalExtension();
            $filename = $uploadHash . '.' . $extension;
            $storagePath = 'public/uploads/' . $filename;

            // Kiểm tra xem file đã tồn tại chưa
            if (Storage::exists($storagePath)) {
                // Trả về đường dẫn ảnh đã tồn tại
                $url = asset('storage/uploads/' . $filename);
                return view('uploadCKEditor', [
                    'CKEditorFuncNum' => $request->CKEditorFuncNum,
                    'data' => [
                        'url' => $url,
                        'message' => "Ảnh đã tồn tại, dùng lại ảnh cũ",
                    ],
                ]);
            }

            // Nếu chưa tồn tại, xử lý và lưu ảnh
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);

            // Resize, watermark, crop... tùy bạn xử lý ở đây
            $image->save(storage_path('app/' . $storagePath));

            // Trả về URL ảnh vừa lưu
            $url = asset('storage/uploads/' . $filename);
            return view('uploadCKEditor', [
                'CKEditorFuncNum' => $request->CKEditorFuncNum,
                'data' => [
                    'url' => $url,
                    'message' => "Upload thành công",
                ],
            ]);
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'Không có file']
        ]);
    }
}
