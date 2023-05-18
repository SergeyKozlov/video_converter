<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 24.03.19
 * Time: 1:34
 */
//exit('video_converter');
//require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');
//require('/var/www/vendor/autoload.php');
require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php');

//use VideMe\Datacraft\TM;
use VideMe\Datacraft\nad;

use VideMe\Datacraft\log\log;
use VideMe\Datacraft\model\PG_elaboration;
//use VideMe\Datacraft\model\PostgreSQL;
//use VideMe\Datacraft\index;
//use VideMe\Datacraft\model\RedisVideme;
//use VideMe\Datacraft\RedisVideme;
//use Predis;
//use Predis\Client;
//use Dotenv;
use \VideMe\Ffmpegconversion\PsqlFfmpeg;

//$tm = new VideMe\Datacraft\TM();
//$tm = new TM();
$log = new log();
$welcome = new NAD();
$pg = new PsqlFfmpeg();

//error_reporting(0); // Turn off error reporting
error_reporting(E_ALL ^ E_DEPRECATED); // Report all errors

/*$dotenv = Dotenv\Dotenv::createImmutable('/tmp/');
$dotenv->load();
echo " _ENV['redis_url'] " . $_ENV['redis_url'];

$host = $_ENV['redis_url'];
$redis = new Predis\Client($_ENV['redis_url']); //16012023*/

// TODO: add Redis cookie
 $user_id = $welcome->CookieToUserId();
//echo "user_id ";
//print_r($user_id);
if (!empty($user_id)) {

    $res_user_id = $pg->pgOneDataByColumn([
        'table' => $pg->table_users,
        'find_column' => 'user_id',
        'find_value' => $user_id]);
    if (empty($res_user_id)) $pg->pgAddData($pg->table_users, ['user_id' => $user_id]);
} else {
//$memcachedSetKey['key'] = md5($_SERVER['HTTP_X_FORWARDED_FOR']);
    $memcachedSetKey['key'] = $welcome->trueRandom();
//$memcachedSetKey['value'] = $welcome->trueRandom();
    $memcachedSetKey['value'] = substr($welcome->getHashClientIp(),0, 12);
    $user_id = substr($welcome->getHashClientIp(),0, 12);
//echo "\r\n<hr>pgUserNew _SERVER['HTTP_X_FORWARDED_FOR'] 1<br>";
//print_r($_SERVER['HTTP_X_FORWARDED_FOR']);
//echo "\r\n<hr>pgUserNew memcachedSetKey 1<br>";
//print_r(['key' => $pgUserNew['userinvite'],
//    'value' => $pgUserNew['user_email']]);
    //print_r($memcachedSetKey);
    $welcome->memcachedSetKey($memcachedSetKey);
//if ($user_id == 'e185775fc4f5') { // aida
    setcookie("vide_nad", $memcachedSetKey['key'], time() + 3600, "/", false);
}




$log->toFile(['service' => 'page_open', 'type' => 'success', 'text' => 'user_id : ' . $user_id . ' HTTP_X_FORWARDED_FOR ' . $welcome->getHashClientIp()]);

$html = <<<XYZ
<!DOCTYPE html>
<html lang="en"
      prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# video: http://ogp.me/ns/video#  article: http://ogp.me/ns/article#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video converter</title>
    <meta name="description" content="Vide.me">
    <link rel="apple-touch-icon" sizes="57x57"
          href="https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/apple-touch-icon-57.png">
    <link rel="apple-touch-icon" sizes="114x114"
          href="https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="72x72"
          href="https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/apple-touch-icon-72.png">
    <link type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="shortcut icon"
          href="https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/favicon.ico">
    <!--
*************************************************************************
*** CODE FOR THE CSS STARTS HERE
*************************************************************************
-->

    <!-- Bootstrap CSS -->
    <!-- Inform modern browsers that this page supports both dark and light color schemes,
    and the page author prefers light. -->
    <meta name="color-scheme" content="light dark">

    <!-- Load the alternate CSS first ... -->
    <link id="css-dark" rel="stylesheet"
          href="https://vinorodrigues.github.io/bootstrap-dark-5/dist/css/bootstrap-night.css"
          media="(prefers-color-scheme: dark)">
    <!-- ... and then the primary CSS last for a fallback on very old browsers that don't support media filtering -->
    <link id="css-light" rel="stylesheet" href="https://vinorodrigues.github.io/bootstrap-dark-5/dist/css/bootstrap.css"
          media="(prefers-color-scheme: light)">
    <!-- / Bootstrap CSS -->

    <!--
      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      !!! CODE FOR THE CSS ***ENDS*** HERE
      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    -->


    <!-- Cheatsheet -->

    <!--
        <link href='https://vinorodrigues.github.io/bootstrap-dark-5/examples/cheatsheet-nights.css' rel='stylesheet'>
    -->
    <script type="text/javascript">    /*
      *************************************************************************
      *** CODE FOR THE TOGGLE BUTTON STARTS HERE
      *************************************************************************
    */
    //localStorage.setItem('preferred-color-scheme', 'light');
    //localStorage.setItem('preferred-color-scheme', 'dark');
    // from: https://stackoverflow.com/questions/9899372#9899701
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    docReady(function () {
        // DOM is loaded and ready for manipulation from here
        // parts from: https://radek.io/posts/secret-darkmode-toggle/
        const toggle_btn = document.getElementById('videme-dark-mode-toggle-btn');
        if (toggle_btn) {
            toggle_btn.addEventListener('click', () => {
                const color_p = toggle_btn.checked ? 'dark' : 'light';

                if (!isCssInit) initColorCSS(color_p);

                setColorPreference(color_p, true);
                updateUI(color_p);
            });
        }
        var isCssInit = false;

        function setColorPreference(color_p, persist = false) {
            const new_s = color_p;
            const old_s = color_p === 'light' ? 'dark' : 'light'
            const el = document.body;  // gets root html tag
            el.classList.add('color-scheme-' + new_s);
            el.classList.remove('color-scheme-' + old_s);
            if (persist) {
                localStorage.setItem('preferred-color-scheme', color_p);
                document.cookie = 'preferred-color-scheme=' + color_p + '; path=/; domain=vide.me; max-age=1209600; secure; SameSite=None;';
            }
        }

        function updateUI(color_p, id = 'css') {
            if (toggle_btn) {
                toggle_btn.checked = color_p === 'dark';
                if (isCssInit) {
                    const el = document.querySelector('#' + id);
                    const data = el.dataset;
                    if (toggle_btn.checked) {
                        el.setAttribute('href', data.hrefDark)
                    } else {
                        el.setAttribute('href', data.hrefLight);
                    }
                    data.colorScheme = color_p;
                }
            }
        }

        function initColorCSS(color_p, id = 'css') {
            isCssInit = true;

            el_o = document.querySelector('#' + id);
            if (el_o !== null) el_o.remove();
            el_l = document.querySelector('#' + id + '-light');
            el_d = document.querySelector('#' + id + '-dark');
            if (color_p === 'dark') {
                el = el_d;
                el_o = el_l;
            } else {
                el = el_l;
                el_o = el_d;
            }
            el.setAttribute('data-href-light', el_l.getAttribute('href'));
            el.setAttribute('data-href-dark', el_d.getAttribute('href'));
            el.setAttribute('data-color-scheme', color_p);
            el.setAttribute('media', 'all');
            el.setAttribute('id', id);
            el_o.remove();
        }

        /*document.addEventListener('keypress', function(event){
            var keyName = event.key;
            if ((keyName == 'd') || (keyName == 'D')) {
                toggle_btn.click();
            }
        });*/
        /* Set Preference on load */
        const osColorPreference = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        // console.log('OS wants ' + osColorPreference);
        //var preferredColorScheme = localStorage.getItem('preferred-color-scheme');
        var preferredColorScheme = document.cookie.match('(^|;)\\s*' + 'preferred-color-scheme' + '\\s*=\\s*([^;]+)')?.pop() || '';
        if (preferredColorScheme !== null) {
            initColorCSS(preferredColorScheme);
        } else {
            preferredColorScheme = osColorPreference;
        }
        setColorPreference(preferredColorScheme, false);
        updateUI(preferredColorScheme);
        //console.info('hs5 coolie ---> ' + $.cookie('vide_nad'));

    });</script>
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
          rel="stylesheet">
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
          rel="stylesheet">
    <link type="text/css" href="https://cdn.jsdelivr.net/jquery.jssocials/1.5.0/jssocials.css" rel="stylesheet">
    <link type="text/css" href="https://cdn.jsdelivr.net/jquery.jssocials/1.5.0/jssocials-theme-classic.css"
          rel="stylesheet">
    <link type="text/css" href="https://unpkg.com/video.js/dist/video-js.min.css" rel="stylesheet">
    <link type="text/css" href="https://players.brightcove.net/videojs-overlay/2/videojs-overlay.css" rel="stylesheet">
    <link type="text/css" href="https://api.vide.me/system/videme.css" rel="stylesheet">
    <script type="text/javascript" src="/system/require.js"></script>
    <!--<script type="text/javascript" src="https://api.vide.me/system/require_vide.js"></script>-->
    <script type="text/javascript" src="/system/geo_chart_require_vide.js"></script>
    <link type="text/css" href="https://api.vide.me/system/jquery-comments.css" rel="stylesheet">
    <!--<link type="text/css" href="https://api.vide.me/system/videojs.thumbnails.css" rel="stylesheet">-->


    <style type="text/css">
        /* Show it is fixed to the top */
        body {
            /*min-height: 75rem;*/ /* TODO: remove */
            /*padding-top: 2.6rem;*/
            padding-top: 47px;
        }

        video {
            max-width: 100%;
            vertical-align: top;
        }

        /*video[poster]{
            max-height: 100px;
        }*/
        .recordrtc video {
            /*
                        width: 70%;
            */
            width: 100%;
        }

        body {
            /*background-color: #EAF3FF;*/
            background-image: none
        }

        .bg-white {
            background-color: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;

        }

        .card-img-top {
            width: 100%;
            /*height:auto;*/
            height: 10rem;
        }

        .bqr {
            max-width: 100px;
            min-width: 100px;
            margin-top: -70px;
            /*margin-bottom: 5px;
            border: 3px solid #fff;
            border-radius: 100%;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);*/
        }

        /*.box {
            width: 100%;
            padding-bottom: 56.25%;
        }*/


        :root {
            --videme-color: rgb(250, 250, 250);
            --videme-color-gray: rgb(168, 168, 168);
            --videme-background-color: rgb(5, 5, 5);
        }

        .color-scheme-dark .bg-white {
            background-color: var(--videme-background-color) !important;
        }

        .color-scheme-dark .itemscope {
            background-color: var(--videme-background-color);
        }

        .color-scheme-dark .videme-tile-v3-card-block {
            background-color: var(--videme-background-color);
        }

        .color-scheme-dark a.videme-v3-link:link {
            background-color: var(--videme-background-color);
            color: var(--videme-color);
        }

        .color-scheme-dark a.videme-v3-link {
            color: white;
        }

        .color-scheme-dark .videme-tile-v3-card-text-date {
            color: white;
        }

        .color-scheme-dark .videme-tile-v3-card-footer {
            color: white;
        }

        .color-scheme-dark .videme-relation-card-user a {
            color: white;
        }

        .color-scheme-dark .text-muted {
            color: white !important;;
        }

        .color-scheme-dark .videme_showcase_item_info {
            color: white;
        }

        .color-scheme-dark .navbar {
            /*background-color: #121212 !important;*/
            background-color: var(--videme-background-color) !important;
        }

        .color-scheme-dark .videme-preview-unavailable-panel {
            background-color: var(--videme-background-color);
        }

        .color-scheme-dark .videme-trend-tag-title a {
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-sign-sign-in {
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-doorbell-sign-1st-line-trend-title a {
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-showcase-title {
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-doorbell-sign-content a {
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-doorbell-sign-title a {
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-doorbell-sign-2nd-line-trend-user-display-name a {
            color: var(--videme-color-gray);
        }

        /* playlist */
        .color-scheme-dark .list-group-item.videme-list-media-li.active {
            background-color: var(--videme-background-color);
            color: var(--videme-color);
        }

        .color-scheme-dark .videme-list-media-title a {
            color: var(--videme-color);
        }
    </style>
    
<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//stats.videcdn.net/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

</head>
<body>
<div id="process_notification" class="alert alert-info flyover flyover-bottom">
    <h3>Do</h3>
    <p>in process &#x2026;</p>
</div>
<div id="error_notification" class="alert alert-danger flyover flyover-bottom">
    <h3>Error</h3>
    <p>Something bad happened. You should try to fix &#x2026;</p>
</div>
<div id="success_notification" class="alert alert-info flyover flyover-bottom">
    <h3>Success</h3>
    <p>The action is completed. </p>
</div>

<nav class="navbar navbar-expand-lg fixed-top navbar-toggleable-md navbar-light bg-light bg-faded navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://sergeykozlov.ru">Sergey Kozlov</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://sergeykozlov.ru/examples/">Examples</a>
                </li>
        </div>
    </div>
</nav>

<div class="modal" id="modal-videme_upload_video_image" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Upload your media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.30.0/js/jquery.fileupload.js"></script>
                <script src="https://api.vide.me/system/videme_upload.js"></script>
                <script src="https://api.vide.me/system/jquery.autosize.min.js"></script>
                <script src="https://api.vide.me/system/jquery.hashtags.min.js"></script>
                <script src="https://api.vide.me/system/image-picker.min.js"></script>-->
                <link type="text/css" href="https://api.vide.me/system/image-picker.css" rel="stylesheet">
                <link rel="stylesheet" href="https://api.vide.me/system/jquery.hashtags.min.css">

                <style type="text/css">
                    .files video {
                        max-width: 100%
                    }

                    /* ******************************************************************************** */
                    #dropzone {
                        /*background: palegreen;
                        width: 150px;
                        height: 50px;
                        line-height: 50px;
                        text-align: center;
                        font-weight: bold;*/
                    }

                    #dropzone.in {
                        /*width: 600px;
                        height: 200px;
                        line-height: 200px;*/
                        font-size: larger;
                    }

                    #dropzone.hover {
                        background: lawngreen;
                    }

                    #dropzone.fade {
                        -webkit-transition: all 0.3s ease-out;
                        -moz-transition: all 0.3s ease-out;
                        -ms-transition: all 0.3s ease-out;
                        -o-transition: all 0.3s ease-out;
                        transition: all 0.3s ease-out;
                        opacity: 1;
                    }

                    /* ******************************************************************************** */
                    .videme-upload-form-footer {
                        width: 100%;
                    }

                    /* ******************************************************************************** */
                    .fileinput-button {
                        position: relative;
                        overflow: hidden;
                        display: inline-block;
                    }

                    .fileinput-button input {
                        position: absolute;
                        top: 0;
                        right: 0;
                        margin: 0;
                        opacity: 0;
                        -ms-filter: 'alpha(opacity=0)';
                        font-size: 200px !important;
                        direction: ltr;
                        cursor: pointer;
                    }
                </style>
                <form class="form-vertical" id="upload_public" name="upload_public" role="form">
                    <input aria-describedby="title" class="form-control" id="title" name="title" placeholder="Title"
                           type="text" style="/*! padding-bottom: 1px; */margin-bottom: .3rem;">
                    <!--<textarea class="form-control" id="content" name="content" rows="2"></textarea>-->
                    <div class="videme-upload-video-preview-panel">
                        <div id="dropzone" class="text-center videme-preview-unavailable-panel fade well">
                            <div class="videme-preview-unavailable-icon"><i class="fa fa-cloud-upload"
                                                                            aria-hidden="true"></i></div>
                            <div class="videme-preview-unavailable-status"><p class="h6">Select your media file</p>
                            </div>
                            <div class="text-muted videme-preview-unavailable-text">You can drag and drop files here to
                                add them.
                            </div>
                        </div>

                        <div class="videme-upload-video-preview hidden">
                            <video class="video-js vjs-big-play-centered" controls="controls"
                                   data-setup='{"fluid": true}' id="my-video_upload" preload="auto">
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        </div>

                        <div class="videme-upload-image-preview-panel hidden">
                            <img class="videme-upload-image-preview" src="" alt="">
                        </div>
                    </div>
                    <div class="progress videme-upload-progress hidden" style="height: .5rem; margin-top: .2rem;">
                        <div aria-valuemax="100" aria-valuemin="0"
                             class="progress-bar progress-bar-striped progress-bar-animated"
                             id="videme_upload_progress_modal" role="progressbar" style=""></div>
                    </div>

                    <div class="videme-upload-video-preview-collection-panel hidden">
                        <h5 class="d-flex justify-content-center" id="">Select the poster frame or video thumbnail</h5>
                        <span class="spinner-border spinner-border-sm videme-load-image-colletion-form-spinner hidden"
                              role="status" aria-hidden="true"></span>
                        <select class="videme-upload-video-preview-collection-tile-image-picker show-html hidden"
                                name="cover_upload">
                        </select>
                    </div>

                    <input id="nad" name="nad" type="hidden">
                    <input class="hidden" id="videme-upload-video-ticket_id" name="ticket_id" type="text">
                    <!--<input id="upload_type" name="upload_type" type="" class="hidden"/>-->
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css" rel="stylesheet">


                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="item_edit_content" rows="3"
                                          name="content"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="TagValue">Tags:</label>
                                <div class="videme-item-edit-tags-links" id="videme-item-edit-tags"></div>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="" id="TagValue" placeholder="Tag">
                                    </div>
                                    <div class="col">
                                        <button id="NewItemTag" type="submit" class="btn btn-outline-info">Add Tag
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-check hidden" id="videme-upload-no-post">
                                <input type="checkbox" class="form-check-input" id="no_post" name="no_post"
                                       value="no_post">
                                <label class="form-check-label" for="no_post">Do not create a post</label>
                            </div>

                        </div>
                    </div>

                </form>

                <div class="alert alert-warning alert-dismissible videme_upload_alert hidden" role="alert">
                    <strong>File size is too big!</strong> The maximum upload file size is 300 MB.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                            id="videme-upload-form-modal-close-button-alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="videme-tile-my-tasks"></div>
                <script type="text/javascript">
                    console.log("pietimer -----> start");
                
                    //require(["jquery", "videme_jq"], function( $ ) {
                    require(["jquery", 'geo_chart_jq'], function( $ ) {
                    console.log("pietimer -----> start require ");

                        $(document).ready(function () {
                    console.log("pietimer -----> start require ready ");
                        
                            $('#timer').pietimer({
                                    seconds: 5,
                                    color: 'rgba(102, 0, 255, 0.8)',
                                    height: 40,
                                    width: 40
                                },
                                function () {
                                    console.log("pietimer -----> location.reload();");
                                });
                            setInterval(function () {
                    console.log("pietimer -----> start require ready setInterval ");
                            
                                $.fn.showMyTaskActiveOnly({
                                    limit: 6,
                                    showcaseMyTask: ".videme-tile-my-tasks"
                                });
                                $('#timer').pietimer('start');
                            }, 5000);
                        });
                    });
                </script>

            </div>
            <div class="modal-footer">

                <form class="videme-upload-form-footer d-flex justify-content-between"
                      action="https://api.vide.me/upload/" enctype="multipart/form-data" id="fileupload" method="POST">
                    <div class="container-fluid px-0">
                        <div class="row justify-content-end">
                            <!--<div class="col-auto">-->


                            <!--</div>-->

                            <!--<div class="col-auto">
                                <div class="input-group">
                        <span class="spinner-border spinner-border-sm2 videme-upload-form-spinner hidden" role="status"
                              aria-hidden="true"></span>
                            </div>
                            </div>-->
                            <input id="upload_type" name="upload_type" type="" class="hidden">

                            <div class="col-auto">
                                <!--<div class="input-group2 videme_upload_video_file_all">-->

                                <button class="btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </button>

                                <button type="button"
                                        class="btn btn-success videme-browse-media-button videme-round-button fileinput-button"
                                        id="">
                                    Choose file
                                    <input accept="video/*,image/*" class="videme_upload_video_file videme-file-input"
                                           id="" name="files" type="file">
                                </button>
                                <input class="hidden" id="videme-upload-video-ticket_id_for_uploader" name="ticket_id"
                                       type="text">
                                <!--</div>-->
                                <div class="input-group videme_upload_video_file_ie hidden">
                                    <div class="custom-file">
                                        <input accept="video/*,image/*" type="file"
                                               class="videme-browse-media-button videme-file-input custom-file-input"
                                               id="inputGroupFile03" name="files"
                                               aria-describedby="inputGroupFileAddon03">
                                        <label class="custom-file-label videme-browse-media-button"
                                               for="inputGroupFile03">Choose file</label>
                                    </div>
                                </div>
                                <button type="button"
                                        class="btn btn-primary upload_public_submit videme-round-button hidden"
                                        id="upload_public_image_submit">
                                    Publish
                                </button>

                                <button type="button"
                                        class="btn btn-primary upload_public_submit videme-round-button hidden"
                                        id="upload_public_video_submit" name="">
                                    Publish
                                </button>
                            </div>

                            <!-- <div class="col-auto">
                             <div class="input-group videme_upload_video_file_ie hidden">
                                 <div class="custom-file">
                                     <input accept="video/*,image/*" type="file"
                                            class="videme-browse-media-button videme-file-input custom-file-input" id="inputGroupFile03"
                                            name="files" aria-describedby="inputGroupFileAddon03"/>
                                     <label class="custom-file-label videme-browse-media-button" for="inputGroupFile03">Choose file</label>
                                 </div>
                             </div>
                             </div>-->

                            <!--<div class="col-auto">
                    <button type="button" class="btn btn-primary upload_public_submit videme-round-button hidden"
                            id="upload_public_image_submit">
                        Publish
                    </button>

                    <button type="button" class="btn btn-primary upload_public_submit videme-round-button hidden"
                            id="upload_public_video_submit"
                            name="">
                        Publish
                    </button>

                    </div>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Flexbox container for aligning the toasts -->
<!--<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">-->
<div id="videme-toast-upload-success" class="toast videme-toast" role="alert" aria-live="assertive"
     aria-atomic="true" data-delay="15000">
    <div class="toast-header videme-toast-success-header">
        <!--<img src="" class="rounded mr-2" alt=""/>-->
        <svg xmlns="http://www.w3.org/2000/svg" class="bd-placeholder-img rounded me-2" width="20" height="20"
             preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#007aff"></rect>
        </svg>
        <strong id="videme-toast-upload-success-title" class="me-auto">Success</strong>
        <small id="videme-toast-upload-success-time-ago">moment ago</small>
        <button type="button" class="btn-close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&#xD7;</span>
        </button>
    </div>
    <div id="videme-toast-upload-success-body" class="toast-body videme-toast-success-body">
        Media uploaded
    </div>
</div>
<!--
</div>-->

<!-- Flexbox container for aligning the toasts -->
<!--<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">-->
<div id="videme-toast-success" class="toast videme-toast" role="alert" aria-live="assertive" aria-atomic="true"
     data-delay="1500">
    <div class="toast-header">
        <!--<img src="" class="rounded mr-2" alt=""/>-->
        <svg xmlns="http://www.w3.org/2000/svg" class="bd-placeholder-img rounded me-2" width="20" height="20"
             preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#007aff"></rect>
        </svg>
        <strong id="" class="me-auto">Success</strong>
        <small id="">moment ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div id="" class="toast-body">
        Done
    </div>
</div>
<!--
</div>-->
<div class="videme-spring-container">
    <div class="videme-spring-row"></div>
</div>
<div class="container-fluid pl-5 pr-5">
    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-8 pl-0 pr-2 bg-white">
            <div class="my-2 px-2 py-2">
                    <video class="action_video video-js vjs-default-skin hidden" id="action_video" controls></video>

                <button id="videme_upload_video_image" href="" data-bs-toggle="modal" data-bs-target="#modal-videme_upload_video_image" class="btn btn-primary">
                    <div class="videme-nav-link-button">
                        <i class="fa fa-cloud-upload fa-lg" style="/*! color: #f7ff00; */"></i>
                    </div>
                    Upload video file
                </button>

<div class='container-fluid my-2 py-2 videme-tile-border'>
                    <div class="videme-v3-tile-title" id="">Tasks</div>
                    <div class="videme-tile" id="videme-tile-my-tasks"></div>
                    <div class="videme-v3-tile-title" id="">Media</div>
                    <div class='row' id='videme-tile-v3'></div>
                </div>
                <script type="text/javascript">
                                require(['jquery', 'geo_chart_jq'], function( $ ) {
                    $(document).ready(function () {
                        $('#videme-tile-my-tasks').html(VidemeProgress);
                                $('#timer').pietimer({
                                    seconds: 5,
                                    color: 'rgba(102, 0, 255, 0.8)',
                                    height: 40,
                                    width: 40
                                },
                                function () {
                                    console.log("pietimer -----> location.reload();");
                                });
                            setInterval(function () {
                                $.fn.showMyTaskActiveOnly({
                                    limit: 6,
                                    showcaseMyTask: "#videme-tile-my-tasks"
                                });
                                $('#timer').pietimer('start');
                            }, 5000);
                    //$('.itemscope').addClass('hidden');
                        $('#videme-tile-v3').itemsMyVideosScrollV3({});
                    });
                    });
                </script>

                <script type="text/javascript">
                    require(['jquery', 'geo_chart_jq'], function ($) {
                        $(document).ready(function () {
                        
//                        $('#videme-tile-v3').itemsMyVideosScrollV3({});
                        
                            /*var item_id = getParameterByName('item');
                            //if (!item_id) item_id = getNextItem();
                            if (!item_id) getNextItem();
                            console.log('html item_id: ' + item_id);
                            var d_start = getParameterByName('d_start');
                            var d_stop = getParameterByName('d_stop');
                            var w_start = getParameterByName('w_start');
                            var w_stop = getParameterByName('w_stop');
                            var m_start = getParameterByName('m_start');
                            var m_stop = getParameterByName('m_stop');*/
                            //if (d_start == null ) ;

                            //$('.videme-media-info').showItemCard({'item_id': item});
                            //==$('.videme-media-info').showItemCardChart({'item_id': item});
                            //$('#videme-item-chart-canvas-share-place').html(chartButtonComposition(item_id));
                            /*$('#chart_run').attr('item_id', item_id);

                            $('#videme-chart-stump_' + item_id).attr('toggled', 'false');
                            if (!d_start) {
                                if (!d_stop) {
                                    if (!w_start) {
                                        if (!w_stop) {
                                            if (!m_start) {
                                                if (!m_stop) {
                                                    m_stop = '1';
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if (w_stop) {
                                if (w_stop == '2') {
                                    $('#videme-chart-button-1st2weeks_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
                                    $('#videme-chart-stump_' + item_id).attr('time_shift_type', 'w_stop').attr('time_shift_val', '2');
                                }
                                if (w_stop == '-2') {
                                    $('#videme-chart-button-last2weeks_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
                                    $('#videme-chart-stump_' + item_id).attr('time_shift_type', 'w_stop').attr('time_shift_val', '-2');
                                }
                            }
                            if (m_stop) {
                                if (m_stop == '1') {
                                    $('#videme-chart-button-1st1months_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
                                    $('#videme-chart-stump_' + item_id).attr('time_shift_type', 'm_stop').attr('time_shift_val', '1');
                                }
                                if (m_stop == '-1') {
                                    $('#videme-chart-button-last1months_' + item_id).removeClass('text-bg-secondary').addClass('text-bg-primary');
                                    $('#videme-chart-stump_' + item_id).attr('time_shift_type', 'm_stop').attr('time_shift_val', '-1');
                                }
                            }
                            $('.videme-item-chart-canvas-place').attr('id', 'videme-item-chart-canvas-place_' + item_id);*/

                            /*$('#videme-item-chart-canvas_' + item_id).showChartShareItem({
                                showChartShareItemId: 'videme-item-chart-canvas_' + item_id,
                                item: item_id,
                                d_start: d_start,
                                d_stop: d_stop,
                                w_start: w_start,
                                w_stop: w_stop,
                                m_start: m_start,
                                m_stop: m_stop,
                            });
                            $.fn.showChartPopStates({
                                item: item_id,
                                showChartPopStatesId: 'videme-chart-pop-states-place_' + item_id
                            });*/
                            //$('#videme-item-chart-canvas_' + item).html(showListMedia(parseMyChartItemsForDoorbellSign({0: item})));

                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
</body>
</html>
XYZ;
echo $html;