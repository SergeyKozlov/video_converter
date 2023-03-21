<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 28.04.18
 * Time: 11:01
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/GeoIP.php');

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//exit;

$welcome = new NAD();
// ON =================$geo = new GeoIP();
//echo $welcome->pgItemCountAdder(['count_item_id' => $_REQUEST['item']]);
$welcome->pgItemCountAdder(['count_item_id' => $_REQUEST['item']]);
$setEvent['item_id'] = $_REQUEST['item'];

$setEvent['user_id'] = $welcome->CookieToUserId();

//if ($welcome->CookieToUserId()) {
if ($setEvent['user_id']) {
    //$setEvent['user_id'] = $welcome->CookieToUserId();
    //$welcome->pgUsersItemsViewsAdder($setEvent);
    //$welcome->outputDDBData($welcome->pgUsersItemsViewsAdder($setEvent));
    $res1 = $welcome->pgUsersItemsViewsAdder($setEvent);
    //$welcome->outputDDBData($welcome->pgUsersItemsTagsViewsAdderWrap($setEvent));
    //$res2 = [];
    $res2 = $welcome->pgUsersItemsTagsViewsAdderWrap($setEvent);
    $welcome->outputDDBData(array_merge($res1, $res2));
}

$itemInfo = $welcome->pgItemFullInfo($setEvent['item_id']);
//$setEvent['item_id'] = $_REQUEST['item'];
/*$setEvent['event_type'] = 'item_view';
$setEvent['title'] = $_REQUEST['title'];
$setEvent['user_display_name'] = $_REQUEST['user_display_name'];
$setEvent['spring'] = $_REQUEST['spring'];
$setEvent['user_picture'] = $_REQUEST['user_picture'];
$setEvent['type_item'] = $_REQUEST['type_item'];*/
/*if (!empty($_REQUEST['type_item'])) {
    $setEvent['tags'] = $_REQUEST['tags'];
}*/
//echo $setEvent['user_id'];
//$trends->setEvent($setEvent);


/* ON ****************** $geoipInit['item_id'] = $itemInfo['item_id'];
$geoipInit['owner_id'] = $itemInfo['owner_id'];
$geoipInit['prev_item_id'] = $welcome->getPrevItemId();
$geoipInit['user_id'] = $setEvent['user_id'];
$geo->geoipInit($geoipInit);*/

if (!in_array($itemInfo['owner_id'], $welcome->userNonFormat) and !empty($itemInfo['owner_id'])) {
    $trends = new Trends();
    $trends->setEventForTags($itemInfo);
}

