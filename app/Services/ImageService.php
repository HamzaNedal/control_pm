<?php

namespace App\Services;

class ImageService {

    public function upload($file, $path)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . uniqid() . '.' . $extension;
        $file->move(public_path().'/'.$path . '/', $fileName);
        return $fileName;
    }
}