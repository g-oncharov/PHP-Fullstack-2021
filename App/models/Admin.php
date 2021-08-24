<?php

namespace Model;

use Framework\Validator\Validator;

class Admin
{
    private Validator $validator;
    private Product $product;
    private string $error;
    public string $imageName;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->product = new Product();
    }

    public function addImage()
    {
        if (isset($_FILES['image'])) {
            $fileTmpName = $_FILES['image']['tmp_name'];
            $errorCode = $_FILES['image']['error'];
            $outputMessage = '';
            if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
                $outputMessage = 'An unknown error occurred while uploading the file.';
            } else {
                $fi = finfo_open(FILEINFO_MIME_TYPE);
                $mime = (string) finfo_file($fi, $fileTmpName);
                if (strpos($mime, 'image') === false) {
                    $outputMessage = 'Only images can be uploaded.';
                }
                $limitBytes  = 1024 * 1024 * 15;

                if (filesize($fileTmpName) > $limitBytes) {
                    $outputMessage = 'Image size must not exceed 15 MB.';
                }
                $image = getimagesize($fileTmpName);
                $name = md5_file($fileTmpName);
                $extension = image_type_to_extension($image[2]);
                $format = str_replace('jpeg', 'jpg', $extension);

                if ($format != '.png' && $format != '.jpg') {
                    $outputMessage = 'You can upload images only .jpg or .png format.';
                }
                $path = dirname(__DIR__, 2) . "/Public/products/";
                $file = $name . $format;
                $this->imageName = $file;

                if (!move_uploaded_file($fileTmpName, $path . $file)) {
                    $outputMessage = 'An error occurred while writing the image to the disc.';
                }
                return $outputMessage;
            }
        }
    }

    public function deleteImage(string $fileName): void
    {
        $path = dirname(__DIR__, 2) . "/Public/products/";
        $filePath = $path . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }


    public function add($arr)
    {
        $result = false;
        $msg = '';

        foreach ($arr as $elem) {
            $elem = $this->validator->clean($elem);
        }

        extract($arr, EXTR_OVERWRITE);

        $condition = isset($title)
                     && isset($description)
                     && isset($price)
                     && isset($category);

        if (!$condition) {
            $msg = 'Fill in all the fields';
        } else {
            $msg = $this->addImage();
            if (!$this->validator->checkLength($title)) {
                $msg = 'Title is invalid (2 to 45 characters)';
            }
            if (!$this->validator->checkLength($description, 8000, 5)) {
                $msg = 'Description is invalid (5 to 8000 characters)';
            }
            if (!ctype_digit($price)) {
                $msg = 'Price is invalid (2 to 45 characters)';
            }
            if (!ctype_digit($category)) {
                $msg = 'Category is invalid (4 to 45 characters)';
            }
            if (!isset($this->imageName)) {
                $msg = 'Image is invalid';
            }
        }

        if (empty($msg)) {
            $price = (int) $price;
            $category = (int) $category;
            $image = $this->imageName;
            $this->product->insert($title, $description, $price, $category, $image);
            $result = true;
        }
        $this->error = $msg;
        return $result;
    }
    /**
     * Getting a error.
     */
    public function getError()
    {
        $result = false;
        if (isset($this->error)) {
            $result = $this->error;
        }
        return $result;
    }
}
