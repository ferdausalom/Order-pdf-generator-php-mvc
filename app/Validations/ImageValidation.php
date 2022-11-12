<?php

namespace App\Validations;

class ImageValidation
{
    // Validate and make image 
    public function validateImage($file)
    {
        $tmp_name = $file['tmp_name'];

        if (is_uploaded_file($tmp_name)) {
            $fileSize = filesize($tmp_name);
            $mime = finfo_open(FILEINFO_MIME_TYPE);
            $fileType = finfo_file($mime, $tmp_name);

            $acceptedType = [
                'image/jpg' => 'jpg',
                'image/jpeg' => 'jpeg',
                'image/png' => 'png'
            ];

            if (in_array($fileType, array_keys($acceptedType))) {
                if ($fileSize > 512000) { //5 KB MAX
                    return 'overSize';
                } else {

                    $subDir = $this->makeDir();
                    $imgName = strtolower(str_replace(' ', '-', $file['name']));
                    $uploadTo = $subDir . '/' . $imgName;
                    move_uploaded_file($tmp_name, $uploadTo);

                    return 'public/assets/thumbnails/' . $imgName;
                }
            } else {
                return 'unsupported';
            }
        }
    }

    // Make directory if not exists 
    public function makeDir()
    {
        $mainDir = publicDir() . 'assets';
        $subDir = publicDir() . 'assets/' . 'thumbnails';

        if (!is_dir($mainDir) && $mainDir !== '') {
            mkdir($mainDir, 0777);
        }

        if (!is_dir($subDir) && $subDir !== '') {
            mkdir($subDir, 0777);
        }

        return publicDir() . 'assets/' . 'thumbnails';
    }
}
