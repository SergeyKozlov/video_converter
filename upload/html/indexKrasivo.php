<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 24.11.16
 * Time: 23:26
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/pas/html/index.php');
//include_once($_SERVER['DOCUMENT_ROOT'] . '/sendmail/sendmail.php');

$welcome = new NAD();
$HTML = new HTML();
//$sendmail = new sendmail();

//error_reporting(0); // Turn off error reporting
//error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

$HTML->HTML_WrapTop();


echo "
<!DOCTYPE html>
<html>
<body>

<link href=\"../css/jquery.filer.css\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"../css/themes/jquery.filer-dragdropbox-theme.css\" type=\"text/css\" rel=\"stylesheet\" />

<!--
<script src=\"http://code.jquery.com/jquery-3.1.0.min.js\"></script>
-->
<script src=\"../js/jquery.filer.min.js\"></script>

<script type=\"text/javascript\">
    $(document).ready(function () {
     $('#filer_input').filer({
         limit: 3,
         maxSize: 3,
         extensions: [\"jpg\", \"png\", \"gif\"],
         showThumbs: true
     });
    });
</script>

<form action=\"https://api.vide.me/upload/\" method=\"post\" enctype=\"multipart/form-data\">
    Select image to upload:
      <input type=\"file\" name=\"files[]\" id=\"filer_input\" multiple=\"multiple\">
      <input type=\"submit\" value=\"Submit\">
</form>

<!--==================================================-->

<form action=\"https://api.vide.me/upload/\" method=\"post\" enctype=\"multipart/form-data\">
    Select image to upload:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
    <input type=\"submit\" value=\"Upload Image\" name=\"submit\">
</form>

</body>
</html>

<!--==================================================-->

<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<title>Example 1 - jQuery Filer 1.3 - CreativeDream</title>

	<!-- Google Fonts -->
	<link href=\"https://fonts.googleapis.com/css?family=Roboto+Condensed\" rel=\"stylesheet\">

	<!-- Styles -->
	<link href=\"../css/jquery.filer.css\" rel=\"stylesheet\">
	<link href=\"../css/themes/jquery.filer-dragdropbox-theme.css\" rel=\"stylesheet\">

	<!-- Jvascript -->
	<script src=\"http://code.jquery.com/jquery-3.1.0.min.js\" crossorigin=\"anonymous\"></script>
	<script src=\"./js/jquery.filer.min.js\" type=\"text/javascript\"></script>
	<script src=\"./js/custom.js\" type=\"text/javascript\"></script>

    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #47525d;
            background-color: #fff;

            margin: 0;
            padding: 20px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }

		.jFiler {
			font-family: inherit;
		}
    </style>
</head>

<body>zz
    <div>
        <h1>Example 2 - jQuery.filer 1.3</h1>
        <p>jQuery.filer - Simple HTML5 file uploader, a plugin tool for jQuery which change completely file input and make it with multiple file selection, drag&amp;drop support, different validations, thumbnails, icons, instant upload, print-screen upload and many other features and options.</p>
        <p><a href=\"https://github.com/CreativeDream/jQuery.filer#demos\">Demos</a> | <a href=\"https://github.com/CreativeDream/jQuery.filer#usage\">Documentation</a> | <a href=\"https://github.com/CreativeDream/jQuery.filer#support\">Support</a></p>
		<hr>
		<a href=\"../../\">&lt; Back</a>
    </div>
    <hr>
    <div id=\"content\">
		<h2>Demo</h2>

		<!-- Example 2 -->
	    <input type=\"file\" name=\"files[]\" id=\"filer_input2\" multiple=\"multiple\">
		<!-- end of Example 2 -->

    </div>
    
    <!--================================-->
    
 
";

$HTML->HTML_WrapDown();