<?php

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

//use VideMe\Datacraft\log\log;
use VideMe\Datacraft\model\PG_elaboration;
//use VideMe\Datacraft\model\PostgreSQL;
use VideMe\Ffmpegconversion\FfmpegConv;
use VideMe\Ffmpegconversion\LogConversion;

//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/FfmpegConv.php');

error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//exit;

$welcome = new NAD();
$log = new LogConversion();
$ffmpeg = new FfmpegConv();
//echo $welcome->pgItemCountAdder(['count_item_id' => $_REQUEST['item']]);
// https://studio7.vide.me/system/items/get_image/?item=1d3534a578e1.mp4&from_seconds=4
// https://studio7.vide.me/system/items/get_image/?item=1d3534a578e1.mp4&limit=4
// https://studio7.vide.me/system/items/get_image/?item=c7e4280d4d5e.m4v&from_seconds=4
// https://studio7.vide.me/system/items/get_image/?ticket_id=1afaa0703c609&limit=4
// https://studio7.vide.me/system/items/get_image/?ticket_id=3056eb323ad4&limit=4
//$fileToMP4_get_image['item'] = $_REQUEST['item'];
if (!empty($_REQUEST['ticket_id'])) {
    $retVal['task_id'] = $welcome->memcachedGetKey(['key' => $_REQUEST['ticket_id']]);
    //$retVal['task_id'] = $_REQUEST['ticket_id'];
    //echo "\n\rretVal\n\r";
    //print_r($retVal);
    //$fileToMP4_get_image['ticket_id'] = $_REQUEST['ticket_id'];
//$fileToMP4_get_image['from_seconds'] = $_REQUEST['from_seconds'];
    //$pgGetTaskById = $log->pgGetTaskById(['task_id' => $fileToMP4_get_image['ticket_id']]);
    //$pgGetTaskById = $log->pgGetTaskById($retVal);
    $fileToMP4_get_image = $log->pgGetTaskById($retVal);
    //echo "\n\rfileToMP4_get_image\n\r";
    //print_r($fileToMP4_get_image);
    //$fileToMP4_get_image['item'] = $pgGetTaskById['task_item_id'];

    $fileToMP4_get_image['limit'] = $welcome->setLimit();

//$ffmpeg->fileToMP4_get_image($welcome->nadtemp . $_REQUEST['item'], ['filename' => $_REQUEST['item'], 'from_seconds' => $_REQUEST['from_seconds']]);
    $welcome->outputDDBData($ffmpeg->fileToMP4_get_image($fileToMP4_get_image));

    /*$user_id = $welcome->CookieToUserId();
    //print_r($user_id);
    //if (empty($user_id)) exit;
    if (empty($user_id)) {
        $log->toFile(['service' => 'file_upload', 'type' => 'error', 'text' => 'upload_init error: HTTP_X_FORWARDED_FOR ' . $_SERVER['HTTP_X_FORWARDED_FOR']]);
        header('Location: https://www.vide.me/web/enter/');
        exit;
    }*/
} else {
    header("HTTP/1.0 404 Not Found");
}
