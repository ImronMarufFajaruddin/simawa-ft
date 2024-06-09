<?php

namespace App\Helpers;

class CkeditorImage
{
  public static function extractImagesFromContent($content)
  {
    $dom = new \DOMDocument();
    @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $images = $dom->getElementsByTagName('img');
    $imagePaths = [];
    foreach ($images as $image) {
      $imagePaths[] = $image->getAttribute('src');
    }
    return $imagePaths;
  }

  public static function deleteUnusedImages($existingContent, $updatedContent)
  {
    $existingImages = self::extractImagesFromContent($existingContent);
    $updatedImages = self::extractImagesFromContent($updatedContent);

    $deletedImages = array_diff($existingImages, $updatedImages);

    foreach ($deletedImages as $deletedImage) {
      DeleteFile::delete(str_replace(asset(''), '', $deletedImage));
    }
  }

  public static function deleteImagesFromContent($content)
  {
    $images = self::extractImagesFromContent($content);
    foreach ($images as $image) {
      DeleteFile::delete(str_replace(asset(''), '', $image));
    }
  }
}
