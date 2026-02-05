<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        // CKEditor may send the file as "upload" (SimpleUploadAdapter). Some builds use "file".
        $file = $request->file('upload') ?? $request->file('file');

        if (!$file) {
            return response()->json(['error' => ['message' => 'No file uploaded.']], 400);
        }
        if (!$file->isValid()) {
            return response()->json(['error' => ['message' => 'Upload failed. Please try again.']], 400);
        }

        $v = Validator::make(
            ['file' => $file],
            ['file' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:4096']]
        );
        if ($v->fails()) {
            return response()->json(['error' => ['message' => $v->errors()->first()]], 400);
        }

        File::ensureDirectoryExists(public_path('uploads/blog'));

        $ext = $file->getClientOriginalExtension() ?: 'jpg';
        $name = 'editor-' . date('YmdHis') . '-' . Str::random(8) . '.' . $ext;
        $file->move(public_path('uploads/blog'), $name);

        $path = 'uploads/blog/' . $name;

        // CKEditor 5 SimpleUploadAdapter expects { url: "..." }
        // Use a relative URL so it works on any local domain.
        return response()->json([
            'url' => '/' . ltrim($path, '/'),
        ]);
    }
}

