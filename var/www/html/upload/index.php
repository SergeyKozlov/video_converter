<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//header('Access-Control-Allow-Origin: https://www.vide.me');
//header('Access-Control-Allow-Origin: https://vide.me');
//header('Access-Control-Allow-Credentials: true');
//exit;

//print_r($_POST['ticket_id']);
//exit;

//require('UploadHandler.php');
//$upload_handler = new UploadHandler();

require($_SERVER['DOCUMENT_ROOT'] . '../vendor/autoload.php');

//use VideMe\Datacraft\TM;
//use VideMe\Datacraft\nad;
use VideMe\Ffmpegconversion\UploadHandler;

//use VideMe\Datacraft\log\log;

$upload_handler = new UploadHandler();
