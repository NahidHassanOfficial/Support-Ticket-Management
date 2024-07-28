<?php

namespace App\Http\Controllers;

class ImageController extends Controller
{
    public function showImage($filename)
    {
        $path = storage_path('app/public/attachments/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file, 200)->header('Content-Type', $type);
    }
}
