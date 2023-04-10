<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 24.03.19
 * Time: 1:34
 */

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

//use VideMe\Datacraft\log\log;
use VideMe\Ffmpegconversion\LogConversion;
use VideMe\Datacraft\model\PG_elaboration;
//use VideMe\Datacraft\model\PostgreSQL;
//use VideMe\Datacraft\index;


//$tm = new VideMe\Datacraft\TM();
//$tm = new TM();
//$log = new log();
$log = new LogConversion();
$welcome = new NAD();

error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors
// TODO: add Redis cookie
 $user_id = $welcome->CookieToUserId();
//echo "user_id ";
//print_r($user_id);
//if (empty($user_id)) exit;
if (empty($user_id)) {
    $log->toFile(['service' => 'file_upload', 'type' => 'error', 'text' => 'upload_init error: HTTP_X_FORWARDED_FOR ' . $_SERVER['HTTP_X_FORWARDED_FOR']]);
    header('Location: https://www.vide.me/web/enter/');
    exit;
}


//$memcachedSetKey['key'] = md5($_SERVER['HTTP_X_FORWARDED_FOR']);
$memcachedSetKey['key'] = $welcome->trueRandom();
$memcachedSetKey['value'] = $welcome->trueRandom();
//echo "\r\n<hr>pgUserNew _SERVER['HTTP_X_FORWARDED_FOR'] 1<br>";
//print_r($_SERVER['HTTP_X_FORWARDED_FOR']);
//echo "\r\n<hr>pgUserNew memcachedSetKey 1<br>";
//print_r(['key' => $pgUserNew['userinvite'],
//    'value' => $pgUserNew['user_email']]);
$welcome->memcachedSetKey($memcachedSetKey);
//if ($user_id == 'e185775fc4f5') { // aida

$log->toFile(['service' => 'file_upload', 'type' => '', 'text' => 'upload_init : ' . $memcachedSetKey['value'] . ' HTTP_X_FORWARDED_FOR ' . $_SERVER['HTTP_X_FORWARDED_FOR']]);

$log->pgSetTask([
    "task_id" => $memcachedSetKey['value'],
    "task_type" => "fileUploadVideoPre",
    "task_status" => "ready",
    'owner_id' => $user_id
    //'owner_id' => ''
]);
//    }
//print_r($memcachedSetKey);
$welcome->outputDDBData($memcachedSetKey);
