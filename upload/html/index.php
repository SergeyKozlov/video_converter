<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 17.08.17
 * Time: 12:33
 */

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/Model.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/View.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/Controller.php');

//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

/*$welcome = new NAD();

if (!empty($_GET["m"])) {
    $file = $_GET["m"];
} else {
    $file = "xwXq9SeBi9k";
}
if (!empty($_GET["messageid"])) {
    $messageid = $_GET["messageid"]; // TODO: Поставить проверку данных
    $fileInfo = $welcome->cbGet($welcome->autoConnectToBucket(["bucket" => "file"]), $messageid);
} else {
    $fileInfo = $welcome->cbFileInfo([$welcome->file => $file]);
}*/

$view->htmlUpload();