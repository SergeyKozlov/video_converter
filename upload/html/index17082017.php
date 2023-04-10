<?php
/**
 * Created by IntelliJ IDEA.
 * User: Пользователь2
 * Date: 18.01.2017
 * Time: 1:03
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

$userId = $welcome->CookieToUserId();

if ($userId) {

    $resUserList = $welcome->ConvParseData($welcome->cbShowUserList([$welcome->userId => $userId]));

    //print_r($resUserList);
    //echo "<br>===== <br>";

    $userList = "";

    if ($resUserList) {

        $userList = "
  <div class=\"form-group\">
      <label for=\"listid\">To list</label>
   <select id=\"listid\" class=\"form-control\" name=\"listid\" form=\"fileupload\">
    <option selected value=\"\">Private</option>
        ";

        foreach ($resUserList as $value1) {

            //print_r($value1["value"]["list"]);
            //echo "<br>====== <br>";
            $userList .= "<option value=\"" . $value1["value"]["docId"] . "\">" . $value1["value"]["list"] . "</option>";
            /*foreach ($value1 as $value2) {
                echo "<a href=\"$value2\">" . key($value1) . "</a> <br>";
                //echo "$value2 === ";
                print_r($value2);
                echo "<br>====== <br>";
            }*/


            //print_r($value1);
        }

        $userList .= "
   </select>
     </div>
        ";
    } else {

    }

    //echo $userList;

    echo "<!-- Bootstrap styles -->
<!--
    <link rel=\"stylesheet\" href=\"//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
-->
<!-- Generic page styles -->

<link rel=\"stylesheet\" href=\"../css/style.css\">

<!-- blueimp Gallery styles -->
<link rel=\"stylesheet\" href=\"//blueimp.github.io/Gallery/css/blueimp-gallery.min.css\">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->

<link rel=\"stylesheet\" href=\"../css/jquery.fileupload.css\">


<link rel=\"stylesheet\" href=\"../css/jquery.fileupload-ui.css\">

<!-- CSS adjustments for browsers with JavaScript disabled -->

<noscript>
    <link rel=\"stylesheet\" href=\"../css/jquery.fileupload-noscript.css\">
</noscript>

<noscript>
    <link rel=\"stylesheet\" href=\"../css/jquery.fileupload-ui-noscript.css\">
</noscript>


<div class=\"container\">
    <div class=\"row\">

        <!--<div class=\"clearfix\">
            <div class=\"pull-left\">
                <h1>jQuery File Upload Demo</h1>
                <h2 class=\"lead\">Basic Plus UI version</h2>
            </div>
            <p class=\"pull-right\">
                <script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
                <ins class=\"adsbygoogle\"
                     style=\"display:inline-block;width:320px;height:100px\"
                     data-ad-client=\"ca-pub-4004031949998028\"
                     data-ad-slot=\"8543690390\"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </p>
        </div>-->

<!--

        <script src=\"//api.vide.me/system/sys.js\" type=\"text/javascript\"></script>
-->

        <script type=\"text/javascript\">


            $(document).ready(function () {


                $('#timer').pietimer({
                        seconds: 5,
                        color: 'rgba(102, 0, 255, 0.8)',
                        height: 40,
                        width: 40
                    },
                    function () {
                        console.log(\"pietimer -----> location.reload();\");
                        //alert('boom');
                        //window.location.assign(\"https://api.vide.me/system/cm/\");
                        //location.reload();

                    });

//showLog(16);

                setInterval(function () {

                    $.fn.showMyTask({
                        limit: 6,
                        showcaseMyTask: \"#videme-my-task\"
                    });
                    $('#timer').pietimer('start');

                }, 5000);


                /*        $.fn.showLimitMode({
                 showcaseLimitMode: 'limit-mode'
                 });*/

            });
        </script>
        <!--
                <div class=\"container-fluid\">
                    <div class=\"row\">
                        -->

        <blockquote>
            <p>Select your files to upload to the service of the Vide.me.</p>
        </blockquote>
        <br>
        <!--
                    </div>
        
                </div>
        -->
<!--
 <button onclick=\"alert('boom')\">Click me</button> 
-->


        <br>

        <!-- The file upload form used as target for the file upload widget -->
        <form id=\"fileupload\" action=\"//api.vide.me/upload/\" method=\"POST\" enctype=\"multipart/form-data\">
            <!-- Redirect browsers with JavaScript disabled to the origin page -->
            <noscript><input type=\"hidden\" name=\"redirect\" value=\"https://api.vide.me/upload/\">
            </noscript>
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class=\"row fileupload-buttonbar\">
                <div class=\"col-lg-7\">
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class=\"btn btn-success fileinput-button\">
                    <i class=\"glyphicon glyphicon-plus\"></i>
                    <span>Add files...</span>
                    <input type=\"file\" name=\"files[]\" multiple>
                </span>
                    <button type=\"submit\" class=\"btn btn-primary start\">
                        <i class=\"glyphicon glyphicon-upload\"></i>
                        <span>Start upload</span>
                    </button>
                    <button type=\"reset\" class=\"btn btn-warning cancel\">
                        <i class=\"glyphicon glyphicon-ban-circle\"></i>
                        <span>Cancel upload</span>
                    </button>
                    <button type=\"button\" class=\"btn btn-danger delete\">
                        <i class=\"glyphicon glyphicon-trash\"></i>
                        <span>Delete</span>
                    </button>
                    <input type=\"checkbox\" class=\"toggle\">
                    <!-- The global file processing state -->
                    <span class=\"fileupload-process\"></span>
                </div>
                <!-- The global progress state -->
                <div class=\"col-lg-5 fileupload-progress fade\">
                    <!-- The global progress bar -->
                    <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\"
                         aria-valuemax=\"100\">
                        <div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div>
                    </div>
                    <!-- The extended global progress state -->
                    <div class=\"progress-extended\">&nbsp;</div>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role=\"presentation\" class=\"table table-striped\">
                <tbody class=\"files\"></tbody>
            </table>
        </form>
        <br>
        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Upload Notes</h3>
            </div>
            <div class=\"panel-body\">
                <ul>
                    <li>The maximum file size for uploads is <strong>20 MB</strong>.
                    </li>
                    <li>Only video files (<strong>MP4, 3GP, MKV</strong>) are allowed.
                    </li>
                </ul>
            </div>
        </div>


        <!--
                    <div id='timer'></div>
        -->


        <div id=\"videme-my-task\" class=\"\"></div>


    </div>
</div>
<!-- The blueimp Gallery widget -->
<div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\" data-filter=\":even\">
    <div class=\"slides\"></div>
    <h3 class=\"title\"></h3>
    <a class=\"prev\">‹</a>
    <a class=\"next\">›</a>
    <a class=\"close\">×</a>
    <a class=\"play-pause\"></a>
    <ol class=\"indicator\"></ol>
</div>
<!-- The template to display files available for upload -->
<script id=\"template-upload\" type=\"text/x-tmpl\">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class=\"template-upload fade\">
        <td>
            <span class=\"preview\"></span>
        </td>
        <td>
            <p class=\"name\">{%=file.name%}</p>
            <strong class=\"error text-danger\"></strong>

  <div class=\"form-group\">
    <label for=\"subject\">Subject</label>
    <input type=\"text\" class=\"form-control\" id=\"subject\" name=\"subject\" placeholder=\"Subject\">
  </div>
  <div class=\"form-group\">
    <label for=\"message\">Message</label>
    <input type=\"text\" class=\"form-control\" id=\"message\" name=\"message\" placeholder=\"Message\">
  </div>

" . $userList . "

        </td>
        <td>
            <p class=\"size\">Processing...</p>
            <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" aria-valuenow=\"0\"><div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class=\"btn btn-primary start\" disabled>
                    <i class=\"glyphicon glyphicon-upload\"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class=\"btn btn-warning cancel\">
                    <i class=\"glyphicon glyphicon-ban-circle\"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}



</script>
<!-- The template to display files available for download -->
<script id=\"template-download\" type=\"text/x-tmpl\">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class=\"template-download fade\">
        <td>
            <span class=\"preview\">
                {% if (file.thumbnailUrl) { %}
                    <a href=\"{%=file.url%}\" title=\"{%=file.name%}\" download=\"{%=file.name%}\" data-gallery><img src=\"{%=file.thumbnailUrl%}\"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class=\"name\">
                {% if (file.url) { %}
                    <a href=\"{%=file.url%}\" title=\"{%=file.name%}\" download=\"{%=file.name%}\" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class=\"label label-danger\">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class=\"size\">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class=\"btn btn-danger delete\" data-type=\"{%=file.deleteType%}\" data-url=\"{%=file.deleteUrl%}\"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{\"withCredentials\":true}'{% } %}>
                    <i class=\"glyphicon glyphicon-trash\"></i>
                    <span>Delete</span>
                </button>
                <input type=\"checkbox\" name=\"delete\" value=\"1\" class=\"toggle\">
            {% } else { %}
                <button class=\"btn btn-warning cancel\">
                    <i class=\"glyphicon glyphicon-ban-circle\"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}



</script>

        <script type=\"text/javascript\">


            $(document).ready(function () {

//$('#dropdownMenu1').on('show.bs.dropdown', function () {
$('#dropdownMenu1').click(function() {
  // do something…
  console.log(\"dropdownMenu1').on('show.bs.dropdown\" );
  //console.log(\"showLog api.vide.me/upload/getmytask/ value -----> \" + JSON.stringify(value));

})
            });
        </script>

<!--
    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src=\"../js/vendor/jquery.ui.widget.js\"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src=\"//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js\"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src=\"//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js\"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src=\"//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js\"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation
<script src=\"//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script> -->
<!-- blueimp Gallery script -->
<script src=\"//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js\"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src=\"../js/jquery.iframe-transport.js\"></script>
<!-- The basic File Upload plugin -->
<script src=\"../js/jquery.fileupload.js\"></script>
<!-- The File Upload processing plugin -->
<script src=\"../js/jquery.fileupload-process.js\"></script>
<!-- The File Upload image preview & resize plugin -->
<script src=\"../js/jquery.fileupload-image.js\"></script>
<!-- The File Upload audio preview plugin -->
<script src=\"../js/jquery.fileupload-audio.js\"></script>
<!-- The File Upload video preview plugin -->
<script src=\"../js/jquery.fileupload-video.js\"></script>
<!-- The File Upload validation plugin -->
<script src=\"../js/jquery.fileupload-validate.js\"></script>
<!-- The File Upload user interface plugin -->
<script src=\"../js/jquery.fileupload-ui.js\"></script>
<!-- The main application script -->
<script src=\"../js/main.js\"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src=\"../../js/cors/jquery.xdr-transport.js\"></script>
<![endif]-->
<!--<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-41071247-1', 'blueimp.github.io');
    ga('send', 'pageview');
</script>
<script>window.cookieconsent_options = {
    \"message\": \"This website uses cookies to ensure you get the best experience on our website\",
    \"dismiss\": \"Got it!\",
    \"learnMore\": \"More info\",
    \"link\": null,
    \"theme\": \"light-bottom\"
};</script>
<script async src=\"//s3.amazonaws.com/cc.silktide.com/cookieconsent.latest.min.js\"></script>
-->
    
 
";

} else {
    $HTML->HTML_Please_Log_In();
    $HTML->HTML_Form_Login_Sign();
}

$HTML->HTML_WrapDown();