<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class DeleteFile
{

  public static function delete($name_file)
  {
    $basePath = url('/');
    $delfile = str_replace("$basePath/", "", $name_file);
    return File::delete($delfile);
  }
}
