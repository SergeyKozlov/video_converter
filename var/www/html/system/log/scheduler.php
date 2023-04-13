<?php

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

//use VideMe\Datacraft\log\log;
use VideMe\Datacraft\model\PG_elaboration;
//use VideMe\Datacraft\model\PostgreSQL;
use VideMe\Ffmpegconversion\FfmpegConv;
use VideMe\Ffmpegconversion\LogConversion;

//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/model/FfmpegConv.php');

error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

//exit;

//$welcome = new NAD();
$log = new LogConversion();
//$ffmpeg = new FfmpegConv();
$log->pgSchedulerWork();
//echo "\n\rdeleteOld:\n\r" . $log->deleteOld() . "\n\r";
echo "\n\rdeleteOld:\n\r";