<?php

namespace App\Helpers;

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class UploadFile
{
  public static function upload($storageLocation, $file)
  {
    $file_extension = $file->getClientOriginalExtension();
    $file_name = time() . '.' . $file_extension;

    // upload file
    $file->move($storageLocation, $file_name);
    $file_url = url("/" . $storageLocation . "/" . $file_name);

    return $file_url;
  }
}
