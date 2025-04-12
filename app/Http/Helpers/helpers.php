<?php
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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

function menuActive($routeName, $type = null)
{

    $class = 'active';
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }


}

function imagePath()
{
    $data['gateway'] = [
        'path' => 'assets/images/gateway',
        'size' => '800x800',
    ];
    $data['verify'] = [
        'withdraw' => [
            'path' => 'assets/images/verify/withdraw'
        ],
        'deposit' => [
            'path' => 'assets/images/verify/deposit'
        ]
    ];
    $data['image'] = [
        'default' => 'assets/images/default.png',
    ];
    $data['withdraw'] = [
        'method' => [
            'path' => 'assets/images/withdraw/method',
            'size' => '800x800',
        ]
    ];
    $data['ticket'] = [
        'path' => 'assets/support',
    ];
    $data['language'] = [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
        'path' => 'assets/images/favicon',
    ];
    $data['extensions'] = [
        'path' => 'assets/images/extensions',
        'size' => '36x36',
    ];
    $data['seo'] = [
        'path' => 'assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user' => [
            'path' => 'assets/images/user/profile',
            'size' => '350x300'
        ],
        'admin' => [
            'path' => 'assets/admin/images/profile',
            'size' => '400x400'
        ]
    ];
    $data['products'] = [
        'path' => 'assets/images/products',
        'size' => '450x500',
        'thumb' => '310x350'
    ];

    $data['blogs'] = [
        'path' => 'assets/images/blogs',
        // 'size' => '450x500',
        'thumb' => '310x350'
    ];
    return $data;
}


function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{
    $manager = new ImageManager(new Driver());
    $path = makeDirectory($location);
    if (!$path)
        throw new Exception('File could not been created.');

    // Tính hash nội dung ảnh
    $hash = md5_file($file->getRealPath());
    $extension = $file->getClientOriginalExtension();
    $filename = $hash . '.' . $extension;

    $fullPath = $location . '/' . $filename;

    // Nếu ảnh đã tồn tại -> trả về tên file
    if (file_exists($fullPath)) {
        return $filename;
    }

    // Nếu có ảnh cũ thì xóa
    if ($old) {
        removeFile(asset('content') . '/' . $location . '/' . $old);
        removeFile(storage_path() . '/' . $location . '/thumb_' . $old);
    }

    // Resize nếu có
    $image = $manager->read($file);
    if ($size) {
        $size = explode('x', strtolower($size));
        $image = $image->scale(width: $size[0], height: $size[1]);
    }

    // Lưu ảnh chính
    $image->save($fullPath);

    // Nếu có yêu cầu tạo ảnh thumbnail
    if ($thumb) {
        $thumb = explode('x', $thumb);
        $manager->read($file)
            ->scale(width: $thumb[0], height: $thumb[1])
            ->save($location . '/thumb_' . $filename);
    }

    return $filename;
}

function makeDirectory($path)
{
    if (file_exists($path))
        return true;
    return mkdir($path, 0755, true);
}

function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}



function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return 123123123;
        // return route('placeholder.image', $size);
    }
    return asset('assets/images/default.jpg');
}

function get_datetime_vn($datetime)
{

    $utcTimezone = new DateTimeZone('UTC'); // UTC timezone
    $currentDateTime = new DateTime($datetime, $utcTimezone);

    // Step 2: Convert the time to the 'Asia/Tokyo' timezone
    $tokyoTimezone = new DateTimeZone('Asia/Ho_Chi_Minh'); // Target timezone
    $currentDateTime->setTimezone($tokyoTimezone);

    // Step 3: Display the converted time
    return $currentDateTime->format('H:i:s') . ' ngày ' . $currentDateTime->format('d/m/Y');
}
