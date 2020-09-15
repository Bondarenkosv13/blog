<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{

    public function upload(UploadedFile $file): string
    {
        $imagePath =  implode('/', str_split(Str::random(8), 4))
            . '/'
            . Str::random(16) . '_' . time() . '.' . $file->getClientOriginalExtension();

        Storage::put(
            'public/' . $imagePath,
            File::get($file)
        );

        return $imagePath;
    }

    public function remove(string $file)
    {
        $dir = strstr($file, '/', true);
        File::deleteDirectory(storage_path('app/public/' . $dir));
    }
}