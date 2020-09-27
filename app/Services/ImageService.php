<?php

namespace App\Services;

class ImageService {

    public function upload($file, $path)
    {
        $name = $file->getClientOriginalName();
        $name = str_replace(',', '', $name);
        $fileName = time() . '.' . $name;
        $file->move(public_path().'/'.$path . '/', $fileName);
        return $fileName;
    }
}