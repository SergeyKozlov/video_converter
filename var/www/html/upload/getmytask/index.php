<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 17.12.17
 * Time: 23:13
 */

require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

//use VideMe\Datacraft\log\log;
use VideMe\Ffmpegconversion\LogConversion;
use VideMe\Ffmpegconversion\PG_ffmpeg;
//use VideMe\Datacraft\model\PostgreSQL;
//use VideMe\Datacraft\index;

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$welcome = new NAD();
$log = new LogConversion();
$userId = $welcome->CookieToUserId();
print_r($userId);
if (!empty($userId)) {
    $welcome->outputDDBData($log->pgGetMyTask(['user_id' => $userId,
        "limit" => $welcome->setLimit()]));
} else {
    //header("HTTP/1.0 404 Not Found");
}