<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$welcome = new NAD();
$log = new log();
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