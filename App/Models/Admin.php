<?php

namespace Model;

use Framework\Validator\Validator;

class Admin
{
    /** @var Validator */
    private Validator $validator;

    /** @var Product */
    private Product $product;

    /** @var string */
    private string $error;

    /** @var string */
    public string $title;

    /** @var string */
    public string $description;

    /** @var string */
    public string $price;

    /** @var string */
    public string $category;

    /** @var string */
    public string $imageName;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->product = new Product();
    }

    /**
     * Add photo to folder
     *
     * @return string
     */
    public function addImage(): string
    {
        $outputMessage = '';
        if (isset($_FILES['image'])) {
            $fileTmpName = $_FILES['image']['tmp_name'];
            $errorCode = $_FILES['image']['error'];
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

                if (empty($outputMessage)) {
                    $image = getimagesize($fileTmpName);
                    $name = md5_file($fileTmpName);
                    $extension = image_type_to_extension($image[2]);
                    $format = str_replace('jpeg', 'jpg', $extension);

                    if ($format != '.png' && $format != '.jpg') {
                        $outputMessage = 'You can upload images only .jpg or .png format.';
                    }
                    $path = dirname(__DIR__, 2) . "/public/products/";
                    $file = $name . $format;
                    $this->imageName = $file;
                    if (!move_uploaded_file($fileTmpName, $path . $file)) {
                        $outputMessage = 'An error occurred while writing the image to the disc.';
                    }
                }
            }
        } else {
            $outputMessage = 'An unknown error occurred while uploading the file.';
        }
        return $outputMessage;
    }

    /**
     * Delete photo from folder
     *
     * @param string $fileName
     */
    public function deleteImage(string $fileName): void
    {
        $path = dirname(__DIR__, 2) . "/public/products/";
        $filePath = $path . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    /**
     * Validate form
     * @param array $array
     * @return bool
     */
    private function validate(array $array): bool
    {
        $result = false;
        $msg = '';

        foreach ($array as $elem) {
            $elem = $this->validator->clean($elem);
        }

        extract($array, EXTR_OVERWRITE);

        $condition = isset($title)
            && isset($description)
            && isset($price)
            && isset($category);

        if (!$condition) {
            $msg = 'Fill in all the fields';
        } else {
            if (!isset($this->imageName)) {
                $msg = $this->addImage();
            }
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
            $this->title = $title;
            $this->description = $description;
            $this->price = (int) $price;
            $this->category = (int) $category;
            $result = true;
        } else {
            $this->error = $msg;
        }
        return $result;
    }

    /**
     * Add a product to the database
     *
     * @param array $array
     * @return bool
     */
    public function add(array $array): bool
    {
        $result = false;
        if ($this->validate($array)) {
            $this->product->insert($this->title, $this->description, $this->price, $this->category, $this->imageName);
            $result = true;
        }
        return $result;
    }

    /**
     * Update a product to the database
     *
     * @param array $array
     * @return bool
     */
    public function update(array $array): bool
    {
        $result = false;

        if (empty($_FILES['image']['name'])) {
            $this->imageName = $array['image'];
        }

        if ($this->validate($array)) {
            $this->product->update(
                $array['id'],
                $this->title,
                $this->description,
                $this->price,
                $this->category,
                $this->imageName
            );
            $result = true;
        }
        return $result;
    }

    /**
     * Getting a error.
     *
     * @return false|string
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
