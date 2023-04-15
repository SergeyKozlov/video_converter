<?php

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

//use VideMe\Datacraft\log\log;
use VideMe\Datacraft\model\PG_elaboration;
//use VideMe\Datacraft\model\PostgreSQL;
use VideMe\Ffmpegconversion\FfmpegConv;
use VideMe\Ffmpegconversion\LogConversion;

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$welcome = new NAD();
$log = new LogConversion();
//$userId = $welcome->CookieToUserId();

if (!empty($_REQUEST['task_id'])) {
    $retVal['task_id'] = $welcome->memcachedGetKey(['key' => $_REQUEST['task_id']]);
    $res = $log->pgGetTaskById($retVal);
    if (!empty($res)) {
        $welcome->outputDDBData($log->pgGetTaskById($retVal));
    } else {
        $welcome->outputDDBData('');
    }
} else {
    //header("HTTP/1.0 404 Not Found");
    $welcome->outputDDBData('');
}