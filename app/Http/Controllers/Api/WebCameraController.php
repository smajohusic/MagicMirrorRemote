<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WebCameraController extends Controller
{
    public function store()
    {
        $filePath = md5(uniqid()) . '.jpg';
        $imageContent = base64_decode(explode(',', request()->imageContent)[1]);
        Storage::disk('local')->put($filePath, $imageContent);

        return [
            'message' => 'Image saved!',
            'path' => 'uploads/' . $filePath
        ];
    }
}
