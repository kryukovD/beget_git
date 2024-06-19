<?php
namespace App\Traits;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    function createThumbImage($file)
    {
        $uniq_name = uniqid() . $file->getClientOriginalName();
        $thumb     = Image::make($file->getRealPath());
        $thumb->resize(427, 212, function ($const) {
            $const->aspectRatio();
        })->save(public_path("/storage/uploads/" . 'thumb_' . $uniq_name));
        return "/storage/uploads/" . 'thumb_' . $uniq_name;
    }

}