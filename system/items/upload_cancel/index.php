<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$welcome = new NAD();
$log = new log();
//$userId = $welcome->CookieToUserId();

if (!empty($_REQUEST['ticket_id'])) {
    $retVal['task_id'] = $welcome->memcachedGetKey(['key' => $_REQUEST['ticket_id']]);
    $log->pgDeleteTaskById(($retVal));
    $welcome->outputDDBData('1');
    $log->toFile(['service' => 'file_upload', 'type' => 'cancel', 'text' => 'upload_cancel task_item_id: ' . $retVal['task_id'] . ' HTTP_X_FORWARDED_FOR ' . $_SERVER['HTTP_X_FORWARDED_FOR']]);
} else {
    header("HTTP/1.0 404 Not Found");
}