<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 01.05.18
 * Time: 17:19
 */

//exit('ok');
use upload\videUpload;

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/upload/videUpload.php');

$welcome = new NAD();
$upload = new videUpload();
//$s3 = new S3();

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//echo 'Start upload';

/*$file_to_upload = $_FILES['croppedImage']['tmp_name'];
$imgToS3IMG['owner_id'] = $welcome->CookieToUserId();

//$file_name = 'cropped.jpg';
$imgToS3IMG['item_id'] = $welcome->trueRandom();
//$file_name = $welcome->nadtemp . $welcome->CookieToUserId() . '_user_picture.jpg';
$file_name = $welcome->nadtemp . $imgToS3IMG['item_id'] . '.jpg';
$imgToS3IMG['file'] = $imgToS3IMG['item_id'] . '.jpg';

echo "\n_Post \n";
print_r($_POST);

echo "\nfile_to_upload \n";
print_r($file_to_upload);

echo "\nfile_name \n";
print_r($file_name);

echo "\nFiles \n";
print_r($_FILES);
//exit;
if (move_uploaded_file($file_to_upload, $file_name)) {

$img = $welcome->imgToS3Items($imgToS3IMG);
} else {
    echo 'move_uploaded_file error';
    return false;
}

switch ($_POST['upload_type']) {
    case "upload_user_picture":
        $resultParseUpdateUserInfo = $welcome->pgUpdateUserInfo(['user_id' => $imgToS3IMG['owner_id']], ['user_picture' => $img]);

        break;
    case "upload_user_cover":
        $resultParseUpdateUserInfo = $welcome->pgUpdateUserInfo(['user_id' => $imgToS3IMG['owner_id']], ['user_cover' => $img]);

        break;
    default:
        break;
}


echo "\nresultParseUpdateUserInfo \n";
print_r($resultParseUpdateUserInfo);*/
/*$resJpgToS3 = $s3->uploadUserPicture([ // TODO: Remove
    "file" => $file_name,
    "name" => $welcome->CookieToUserId() . '_user_picture.jpg'
]);

echo $resJpgToS3 . $welcome->CookieToUserId() . '_user_picture.jpg';*/
$user_id = $welcome->CookieToUserId();
if ($user_id) {
    $uploadDo['tmp_name'] = $_FILES['croppedImage']['tmp_name'];
    $uploadDo['owner_id'] = $welcome->CookieToUserId();
    /*$uploadDo['title'] = ($_REQUEST["title"]) ?: null;
    $uploadDo['content'] = ($_REQUEST["content"]) ?: null;*/
    if (isset($_REQUEST["title"])) {
        $uploadDo['title'] = $_REQUEST["title"];
    } else {
        $uploadDo['title'] = '';

    };
    if (isset($_REQUEST["content"])) {
        $uploadDo['content'] = $_REQUEST["content"];
    } else {
        $uploadDo['content'] = '';
    }

// ===============================
    /*if (!empty($_POST['access'])) {
        $uploadDo['access'] = $_POST['access'];
    } else {
        $uploadDo['access'] = 'public';
    }*/

    if (!empty($_POST['album_id'])) $uploadDo['album_id'] = $_POST["album_id"];
    if ($uploadDo['album_id'] == 'public') {
        $uploadDo['access'] = 'public';
    } elseif ($uploadDo['album_id'] == 'friends') {
        $uploadDo['access'] = 'friends';
    } elseif ($uploadDo['album_id'] == 'private') {
        $uploadDo['access'] = 'private';
    } elseif (!empty($uploadDo['album_id'])) {
        $albumInfo = $welcome->pgAlbumInfoById($uploadDo);
        $uploadDo['access'] = $albumInfo['access'];
    }
// ===============================
    if (!empty($_POST['upload_type'])) {
        $uploadDo['upload_type'] = $_POST['upload_type'];
    } else {
        //$uploadDo['upload_type'] = 'public';
        header("HTTP/1.0 404 Not Found");
        echo 'Empty upload_type';
        exit;
    }
// ===============================
    $upload->uploadDo($uploadDo);
} else {
    header("HTTP/1.0 404 Not Found");
}