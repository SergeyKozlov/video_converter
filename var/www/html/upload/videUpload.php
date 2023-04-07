<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 07.05.18
 * Time: 15:46
 */

namespace upload;
use FileSteward;
use ImageSteward;
use NAD;

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/FileSteward.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/ImageSteward.php');

class videUpload
{
    private $upload_type;
    private $img;
    private $imgToS3IMG;

    /**
     * @param mixed $upload_type
     */
    public function setUploadType($upload_type): void
    {
        $this->upload_type = $upload_type;
    }

    /**
     * @return mixed
     */
    public function getUploadType()
    {
        return $this->upload_type;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $imgToS3IMG
     */
    public function setImgToS3IMG($imgToS3IMG): void
    {
        $this->imgToS3IMG = $imgToS3IMG;
    }

    /**
     * @return mixed
     */
    public function getImgToS3IMG()
    {
        return $this->imgToS3IMG;
    }

    public function uploadDo($uploadDo)
    {
        $welcome = new NAD();
        $is = new ImageSteward();
        switch ($uploadDo['upload_type']) {
            case "upload_user_picture":
                $uploadDo['post_type'] = 'update_user_picture';
                list($width, $height) = getimagesize($uploadDo['tmp_name']);
                if ($width > 300) $width = 300;
                $is->resizeImage($uploadDo['tmp_name'], $uploadDo['tmp_name'], $width);
                $this->uploadImage_tmp_name($uploadDo);
                $img = $this->getImg();
                $imgToS3IMG = $this->getImgToS3IMG();
                $welcome->pgUpdateUserInfo(['user_id' => $imgToS3IMG['owner_id']], ['user_picture' => $img]);
                break;
            case "upload_user_cover":
                $uploadDo['post_type'] = 'update_user_cover';
                list($width, $height) = getimagesize($uploadDo['tmp_name']);
                if ($width > 800) $width = 800;
                $is->resizeImage($uploadDo['tmp_name'], $uploadDo['tmp_name'], $width);
                $this->uploadImage_tmp_name($uploadDo);
                $img = $this->getImg();
                $imgToS3IMG = $this->getImgToS3IMG();
                $welcome->pgUpdateUserInfo(['user_id' => $imgToS3IMG['owner_id']], ['user_cover' => $img]);
                break;
            case "upload_user_cover_top":
                $uploadDo['post_type'] = 'user_cover_top';
                list($width, $height) = getimagesize($uploadDo['tmp_name']);
                if ($width > 1200) $width = 1200;
                $is->resizeImage($uploadDo['tmp_name'], $uploadDo['tmp_name'], $width);
                $this->uploadImage_tmp_name($uploadDo);
                $img = $this->getImg();
                $imgToS3IMG = $this->getImgToS3IMG();
                $welcome->pgUpdateUserInfo(['user_id' => $imgToS3IMG['owner_id']], ['user_cover_top' => $img]);
                break;
            case "upload_image":
                $uploadDo['post_type'] = 'update';
                list($width, $height) = getimagesize($welcome->nadtemp . $uploadDo['file']);
                if ($width > 800) $width = 800;
                $is->resizeImage($welcome->nadtemp . $uploadDo['file'], $welcome->nadtemp . $uploadDo['file'], $width);
                $this->uploadImage($uploadDo);
                break;
            default:
                break;
        }
    }

    public function uploadImage_tmp_name($uploadImage)
    {
        //echo "\nuploadImage \n";
        //print_r($uploadImage);
        $welcome = new NAD();
        $fs = new FileSteward();
        $file_to_upload = $uploadImage['tmp_name'];
        $imgToS3IMG['owner_id'] = $welcome->CookieToUserId();
        $imgToS3IMG['access'] = $uploadImage['access'];
        $imgToS3IMG['title'] = $uploadImage['title'];
        $imgToS3IMG['content'] = $uploadImage['content'];
        $imgToS3IMG['post_type'] = $uploadImage['post_type'];
        $imgToS3IMG['item_id'] = $welcome->trueRandom();
        $file_name = $welcome->nadtemp . $imgToS3IMG['item_id'] . '.jpg';
        $imgToS3IMG['file'] = $imgToS3IMG['item_id'] . '.jpg';
        if (move_uploaded_file($file_to_upload, $file_name)) {
            $img = $fs->imgToS3Items($imgToS3IMG);
            $this->setImg($img);
            $this->setImgToS3IMG($imgToS3IMG);
            return true;
        } else {
            echo 'move_uploaded_file error';
            return false;
        }
    }

    public function uploadImage($uploadImage)
    {
        //echo "\nuploadImage \n";
        //print_r($uploadImage);
        $welcome = new NAD();
        $fs = new FileSteward();
        $imgToS3IMG['owner_id'] = $welcome->CookieToUserId();
        $imgToS3IMG['access'] = $uploadImage['access'];
        $imgToS3IMG['title'] = $uploadImage['title'];
        $imgToS3IMG['content'] = $uploadImage['content'];
        $imgToS3IMG['post_type'] = $uploadImage['post_type'];
        $imgToS3IMG['item_id'] = $welcome->trueRandom();
        $imgToS3IMG['file'] = $imgToS3IMG['item_id'] . '.jpg';
        $img = $fs->imgToS3Items($uploadImage);
        $this->setImg($img);
        $this->setImgToS3IMG($imgToS3IMG);
    }

    public function stuffUpload()
    {
        if (!empty($_FILES['file'])) {
            $path = "/media/next/s3/" . $_POST['origin'] . "/";
            $path = $path . basename($_FILES['file']['name']);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                echo "The file " . basename($_FILES['file']['name']) . " has been uploaded to " . $path . ".\n\r";
            } else {
                echo "There was an error uploading the file, please try again!\n\r";
            }
        }
    }
}