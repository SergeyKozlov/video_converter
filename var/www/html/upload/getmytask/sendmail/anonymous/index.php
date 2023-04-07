<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 16.01.19
 * Time: 13:56
 */

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$welcome = new NAD();
$log = new log();
$userId = $welcome->CookieToUserId();

if (!empty($userId)) {
    $welcome->outputDDBData($log->pgGetMyTask(['user_id' => $userId,
        "limit" => $welcome->setLimit()]));
} else {
    header("HTTP/1.0 404 Not Found");
}