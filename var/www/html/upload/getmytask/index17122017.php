<?php
/**
 * Created by IntelliJ IDEA.
 * User: Пользователь2
 * Date: 20.01.2017
 * Time: 2:42
 */

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/system/log/log.php');

$welcome = new NAD();
$log = new log();
$userId = $welcome->CookieToUserId();

if (!empty($userId)) {
    $welcome->outputCBData($log->getMyTask(['userId' => $userId,
                        "limit" => $welcome->setLimit()]));
} else {
    header("HTTP/1.0 404 Not Found");
}