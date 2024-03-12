<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{

    private function uploadFile(UploadedFile $file,$directoryPath = 'resume', $fileName)
    {
        if (!Storage::disk('public')->exists($directoryPath)) {
            Storage::disk('public')->makeDirectory($directoryPath, $mode = 0777, true, true);
        }

        $uploadedFileName = str($fileName . time() . rand(100, 999))->slug('-') . '.' . $file->extension();
        $file->storeAs('public/' . $directoryPath . '/', $uploadedFileName);
        return $uploadedFileName;
    }
}
