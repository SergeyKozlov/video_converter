<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 25.03.19
 * Time: 12:05
 */

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//print_r($_POST['ticket_id']);
//exit;

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

//use VideMe\Datacraft\log\log;
use VideMe\Ffmpegconversion\LogConversion;
use VideMe\Ffmpegconversion\NADFFMpeg;


//$tm = new VideMe\Datacraft\TM();
//$tm = new TM();
//$log = new log();
$log = new LogConversion();
$welcome = new NAD();
//$log = new log();
$article = new NADFFMpeg();


$retVal = null;
$user_id = $welcome->CookieToUserId();
if (empty($user_id)) {
    echo 'No login';
    exit;
}

if (!empty($_POST['title'])) {
    $retVal['title'] = $_POST['title'];
}
if (!empty($_POST['content'])) {
    $retVal['content'] = $_POST['content'];
}
/*if (!empty($_POST['cover'])) {
    $retVal['cover'] = $_POST['cover1'];
}*/
if (!empty($_POST['cover_upload'])) {
    $retVal['cover_upload'] = $_POST['cover_upload'];
}
if (!empty($_POST['album_id'])) {
    $retVal['album_id'] = $_POST["album_id"];
}
//if (!empty($_POST['ticket_id'])) $retVal['ticket_id'] = $_POST["ticket_id"]; //??????????????????
//if (!empty($_POST['ticket'])) $retVal['ticket'] = $_POST["ticket"];
$retVal['task_id'] = $welcome->memcachedGetKey(['key' => $_POST['ticket_id']]);
//$retVal['access'] = $_POST['access'] ?? 'private';
if ($retVal['album_id'] == 'public') { // TODO: not in web
    $retVal['access'] = 'public';
} elseif ($retVal['album_id'] == 'friends') {
    $retVal['access'] = 'friends';
} elseif ($retVal['album_id'] == 'private') {
    $retVal['access'] = 'private';
} elseif (!empty($retVal['album_id'])) {
    $retVal['owner_id'] = $user_id;
    $albumInfo = $welcome->pgAlbumInfoById($retVal);
    //echo "\n\ralbumInfo\n\r";
    //print_r($albumInfo);
    $retVal['access'] = $albumInfo['access'];
}
$retVal['access'] = 'public';

//$retVal = $welcome->uploadSetParam($_POST); // TODO: this


if (!empty($_POST["tags"])) {
    //$retVal['tags'] = $_REQUEST["tags"];
    $retVal['tags'] = json_encode($article->paddingTagsForItem($_POST['tags'])); // Brasília -> [tags] => ["Bras\u00edlia"]

} /*else {
    //$retVal['tags'] = '';
    $retVal['tags'] = NULL;
}*/
/*if (!empty($_POST["ext_links"])) {
    //$retVal['ext_links'] = $_REQUEST["ext_links"];
    $retVal['ext_links'] = json_encode($_POST['ext_links']);

} else {
    $retVal['ext_links'] = NULL;
}*/

/*if (!empty($pgItemUpdate["tags"])) {
    $itemTrue['tags'] = json_encode($article->paddingTagsForItem($pgItemUpdate['tags'])); // Brasília -> [tags] => ["Bras\u00edlia"]
    //$itemTrue['tags'] = json_encode($pgItemUpdate['tags']); // NOOO [tags] => {"Bras\u00edlia":"Bras\u00edlia"}
}
if (!empty($pgItemUpdate['ext_links'])) {
    //$this->addExtLinkAgregation($pgItemUpdate);
    $itemTrue['ext_links'] = json_encode($pgItemUpdate['ext_links']);
    //print_r($itemTrue);
} else {
    //$itemTrue['ext_links'] = 'NULL';
    $itemTrue['ext_links'] = NULL;
    //$itemTrue['ext_links'] = '{}';
    //$itemTrue['ext_links'] = '';
}*/

if(isset($_POST['no_post'])) {
    //$response = 'I want to receive a response from the support service';
    $retVal['status'] = 'draft';
} else {
    $retVal['status'] = 'published';
}

$currentTask = $log->pgGetTaskById($retVal);
//echo "\n\rcurrentTask\n\r";
//print_r($currentTask);
//echo "\n\rretVal\n\r";
//print_r($retVal);

if (!empty($currentTask['converted']) and $currentTask['converted'] == true) {
    //echo "\n\rcurrentTask converted true \n\r" . $currentTask['converted'];

    /* change task ********************************
        upload to aws */
    /*$log->taskChangeData($retVal, [
        "task_id" => $currentTask['task_id'],
        "task_type" => "fileSendToS3",
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
        'tags' => $retVal['tags'],
        //'ext_links' => $retVal['ext_links'] <<---------- WARNING!!!
        //'data_json' => json_encode($fileToHls)
    ]);*/
    /* Change task ********************************   */
    $retVal['task_id'] = $currentTask['task_id'];
    $retVal['task_type'] = 'fileSendToS3';
    $retVal['task_status'] = 'awaiting';
    //$retVal['status'] = 'published';
    $retVal['task_item_id'] = $currentTask['task_item_id'];
    $retVal['video_duration'] = $currentTask['video_duration'];
    $retVal['owner_id'] = $currentTask['owner_id'];
} else {
    //echo "\n\rcurrentTask converted false \n\r";
    /*$log->taskChangeData($retVal, [
        //"task_type" => "fileUploadVideoPre",
        //"task_status" => "awaiting",
        //"file_size_start" => $file->size,
        //"fileSizeDone" => "",
        "status" => 'published',
        "access" => $retVal['access'],
        //"file" => $file->name,
        //"file_type" => $path_parts['extension'],
        //"task_item_id" => $path_parts['filename'],
        //$welcome->file => $file->name . $type; //<---,
        //$welcome->file => $file->name . $this->get_file_type($file_path); //<---,
        'title' => $retVal['title'],
        'content' => $retVal['content'],
        //'type' => 'video',
        'album_id' => $retVal['album_id'],
        //'owner_id' => $retVal['owner_id'],
        'tags' => $retVal['tags'],
        //'ext_links' => $retVal['ext_links'] <<---------- WARNING!!!
    ]);*/
    //$retVal['status'] = 'published';

}
//$retVal['status'] = 'published';
$log->taskChangeData($retVal, $retVal);

$log->toFile(['service' => 'file_upload', 'type' => '', 'text' => 'upload_public_video : ' . $currentTask['file'] . ' user_id: ' . $user_id]);


//echo 'Ok';

//print_r($memcachedSetKey);
//$welcome->outputDDBData($memcachedSetKey);

header("HTTP/1.1 200 OK");