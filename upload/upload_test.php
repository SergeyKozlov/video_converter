<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/upload/videUpload.php');

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

/*
 * curl \
  -F "file=@/home/sergey/Dropbox/vide/doc/emmergency_10112021.txt" \
  -F "origin=test" \
  https://video.vide.me/upload/upload_test.php
*/

$videUpload = new videUpload();
//print_r($_REQUEST);
//print_r($_POST);
$videUpload->stuffUpload();