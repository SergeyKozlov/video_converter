<?php


include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/upload/videUpload.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');

//print_r($_POST['ticket_id']);
//exit;

$welcome = new NAD();
$upload = new videUpload();
$log = new log();


//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$uploadDo = null;
$user_id = $welcome->CookieToUserId();
//echo '$user_id';
//print_r($user_id);
if ($user_id) {
    //$uploadDo['tmp_name'] = $_FILES['croppedImage']['tmp_name'];
    //$uploadDo['owner_id'] = $welcome->CookieToUserId();
    /*if (!empty($_POST['title'])) {
        $uploadDo['title'] = $_POST['title'];
    } else {
        $uploadDo['title'] = '';
    }
    if (!empty($_POST['content'])) {
        $uploadDo['content'] = $_POST['content'];
    } else {
        $uploadDo['content'] = '';
    }
    if (!empty($_POST['album_id'])) {
        $uploadDo['album_id'] = $_POST["album_id"];
    } else {
        $uploadDo['album_id'] = '';
    }
    if (!empty($_POST['ticket_id'])) $uploadDo['ticket_id'] = $_POST["ticket_id"]; //??????????????????
//if (!empty($_POST['ticket'])) $retVal['ticket'] = $_POST["ticket"];
    $uploadDo['task_id'] = $welcome->memcachedGetKey(['key' => $_POST['ticket_id']]);
//$retVal['access'] = $_POST['access'] ?? 'private';
    if ($uploadDo['album_id'] == 'public') {
        $uploadDo['access'] = 'public';
    } elseif ($uploadDo['album_id'] == 'friends') {
        $uploadDo['access'] = 'friends';
    } elseif ($uploadDo['album_id'] == 'private') {
        $uploadDo['access'] = 'private';
    } elseif (!empty($uploadDo['album_id'])) {
        $albumInfo = $welcome->pgAlbumInfoById($uploadDo);
        $uploadDo['access'] = $albumInfo['access'];
    }*/
    $uploadDo = $welcome->uploadSetParam($_POST);
    //echo '$uploadDo';
    //print_r($uploadDo);

    $currentTask = $log->pgGetTaskById($uploadDo);
    //echo '$currentTask';
    //print_r($currentTask);
    // ===============================
    /*if (!empty($_POST['upload_type'])) {
        $uploadDo['upload_type'] = $_POST['upload_type'];
    } else {
        //$uploadDo['upload_type'] = 'public';
        header("HTTP/1.0 404 Not Found");
        echo 'Empty upload_type';
        exit;
    }*/
    $uploadDo['item_id'] = $welcome->trueRandom();
    $uploadDo['upload_type'] = 'upload_image';

    // ===============================


    if (!empty($currentTask['owner_id']) == $user_id
        and $currentTask['task_type'] == "upload_image") {
    /*if (!empty($currentTask['owner_id']) == $user_id) {*/
        //echo "\n\rcurrentTask \n\r";
        //print_r($currentTask);

        /* change task ********************************
            upload to aws */
        //$uploadDo['tmp_name'] = $welcome->nadtemp . $currentTask['file'];
        //$uploadDo['tmp_name'] = $currentTask['file'];
        //$uploadDo['file'] = $currentTask['file'];
        //$uploadDo['owner_id'] = $currentTask['owner_id'];
        $uploadDoMerge = array_merge($currentTask, $uploadDo);
        //$upload->uploadDo($uploadDo);
        //echo "\n\ruploadDoMerge \n\r";
        //print_r($uploadDoMerge);
        $upload->uploadDo($uploadDoMerge);
        //$log->taskChangeStatus($lastTask, "success");

        /*$log->taskChangeData($retVal, [
            "task_id" => $currentTask['task_id'],
            "task_type" => "public_image",
            "task_status" => "awaiting",
            //"file_size_start" => $file->size,
            //"fileSizeDone" => "",
            "status" => 'published',
            "access" => $retVal['access'],
            //"file" => $file->name,
            //"file_type" => $path_parts['extension'],
            "task_item_id" => $currentTask['task_item_id'],
            'video_duration' => $currentTask['video_duration'],
            //$welcome->file => $file->name . $type; //<---,
            //$welcome->file => $file->name . $this->get_file_type($file_path); //<---,
            'title' => $retVal['title'],
            'content' => $retVal['content'],
            'type' => 'video',
            'album_id' => $retVal['album_id'],
            'owner_id' => $currentTask['owner_id'],
            //'data_json' => json_encode($fileToHls)
        ]);*/
        $log->taskChangeData($currentTask, ["task_type" => "public_image"]);
        /* Change task ********************************   */

    } else {
        echo 'No task';
    }





//print_r($memcachedSetKey);
//$welcome->outputDDBData($memcachedSetKey);
} else {
    header("HTTP/1.0 404 Not Found");
}