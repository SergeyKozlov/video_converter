<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 26.07.17
 * Time: 15:05
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/index.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Element.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLmodal.php');

/*spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});*/

abstract class baseHtml
{
    public $vars = array();
    public $contentInfo = array();
    /*public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }*/
    public function __construct()
    {
        //$this->welcome = new NAD();
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param array $vars
     */
    public function setVars($vars)
    {
        $this->vars = $vars;
    }
    public function setContentInfo($setContentInfo)
    {
        $this->contentInfo = $setContentInfo;
    }
    public function getContentInfo()
    {
        return $this->contentInfo;
    }

    //abstract public function showOGvideo($dom, $head);


    public function mainContainer($mainContainer){
        return "
        <div class='container'>container
            {$this->row($this->col_md("3", $mainContainer))}
            {$this->col_md("6")}
            {$this->col_md("3")}
            
        </div>
        ";
    }

    public function showFooter(){
        return "<hr>Footer";
    }

    public function htmlSet($dom, $root, $contentInfo = [])
    {
        //$this->doc = new DOMDocument('1.0', 'UTF-8');
        //$dom->formatOutput = true;
        //$doc->preserveWhiteSpace=false;
        //print_r($contentInfo);
        //$welcome = new NAD();

        $element = new Element();
        $HTMLsample = new baseHTMLsample();
        //$HTMLModal = new baseHTMLmodal();

        $head = $element->writeSmartTag($dom, $root,
            [$element->elementName => 'head']);
        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'charset',
                $element->attributeValue => 'utf-8']);

        $title = 'Vide.me';

        if (!empty($contentInfo["user_display_name"])) {
            $title = $contentInfo["user_display_name"] . ' | Vide.me';
        }

        if (!empty($contentInfo["title"])) {
            //$title = $welcome->safetyTagsSlashesTrim4096($contentInfo["title"]) . ' | Vide.me';
            $title = $contentInfo["title"] . ' | Vide.me';
        }

        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'name',
                $element->attributeValue => 'viewport',
                $element->attributeName2 => 'content',
                $element->attributeValue2 => 'width=device-width, initial-scale=1.0'
            ]);

        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'title',
                $element->text => $title]);

        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->elementName => 'meta',
                $element->attributeName => 'name',
                $element->attributeValue => 'description',
                $element->attributeName2 => 'content',
                $element->attributeValue2 => $title
            ]);

        $element->createTextNode($dom, $head, ['text' => "\n"]);

        if (!empty($contentInfo['tags'])) {
            $tagsArray = json_decode($contentInfo['tags'], true);
            //$tags = implode(' ', $contentInfo['tags']);
            $tags = implode(' ', $tagsArray);
            //print_r($contentInfo['tags']);
            //var_dump($tagsArray);
            $element->writeSmartTag($dom, $head,
                [$element->elementName => 'meta',
                    $element->attributeName => 'name',
                    $element->attributeValue => 'keywords',
                    $element->attributeName2 => 'content',
                    $element->attributeValue2 => $tags
                ]);

            $element->createTextNode($dom, $head, ['text' => "\n"]);
        }


            $element->writeSmartTag($dom, $head,
            [$element->rel => $element->apple_touch_icon,
                $element->sizes => '57x57',
                $element->href => 'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/apple-touch-icon-57.png']);

        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->rel => $element->apple_touch_icon,
                $element->sizes => '114x114',
                $element->href => 'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/apple-touch-icon-114.png']);

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->rel => $element->apple_touch_icon,
                $element->sizes => '72x72',
                $element->href => 'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/apple-touch-icon-72.png']);


        /* 28102021 $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/require.js']);

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/require_vide.js']);*/




        /* 03022022 */$element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                //$element->href =>'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css']);
                //$element->href =>'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css']);
                $element->href =>'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css']);
        /*$element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js']);*/
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js']);*/
                //$element->src =>'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js']);

        /*$element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->rel => $element->shortcut_icon,
                $element->href => 'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/favicon.ico']);



        /* 03022022 */ $element->writeFragmentElement($dom, $head, "
           <!--
  *************************************************************************
  *** CODE FOR THE CSS STARTS HERE
  *************************************************************************
-->

    <!-- Bootstrap CSS -->
    <!-- Inform modern browsers that this page supports both dark and light color schemes,
    and the page author prefers light. -->
    <meta name='color-scheme' content='light dark'/>

<!-- Load the alternate CSS first ... -->
<link id='css-dark' rel='stylesheet' href='https://vinorodrigues.github.io/bootstrap-dark-5/dist/css/bootstrap-night.css' media='(prefers-color-scheme: dark)'/>
<!-- ... and then the primary CSS last for a fallback on very old browsers that don't support media filtering -->
    <link id='css-light' rel='stylesheet' href='https://vinorodrigues.github.io/bootstrap-dark-5/dist/css/bootstrap.css' media='(prefers-color-scheme: light)'/>
    <!-- / Bootstrap CSS -->

    <!--
      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      !!! CODE FOR THE CSS ***ENDS*** HERE
      !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    -->


    <!-- Cheatsheet -->

<!--
    <link href='https://vinorodrigues.github.io/bootstrap-dark-5/examples/cheatsheet-nights.css' rel='stylesheet'>
-->");
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->text => $HTMLsample->showBS5_darkJS()]);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css']);

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://malsup.github.io/min/jquery.form.min.js']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/jquery.cookie.js']);*/

        /*28102021 */
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/pgwbrowser.min.js']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js']);*/

        /* 28102021 */
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://ea1116048a2ffc61f8b7-d479f182e30f6e6ac2ebc5ce5ab9de7b.ssl.cf1.rackcdn.com/jquery.jqpagination.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://cdn.jsdelivr.net/jquery.jssocials/1.5.0/jssocials.css']);

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://cdn.jsdelivr.net/jquery.jssocials/1.5.0/jssocials-theme-classic.css']);

        /* 28102021 */
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdn.jsdelivr.net/jquery.jssocials/1.5.0/jssocials.min.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                //$element->href =>'//vjs.zencdn.net/5.19/video-js.min.css']);
                //$element->href =>'https://vjs.zencdn.net/7.0/video-js.min.css']);
                //$element->href =>'https://vjs.zencdn.net/7.3.0/video-js.min.css']);
                $element->href =>'https://vjs.zencdn.net/7.7.5/video-js.min.css']);

        /* 28102021 */
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                //$element->src =>'//vjs.zencdn.net/5.19/video.min.js']);
                //$element->src =>'https://vjs.zencdn.net/7.0/video.min.js']);
                //$element->src =>'https://vjs.zencdn.net/7.3.0/video.min.js']);
                $element->src =>'https://vjs.zencdn.net/7.7.5/video.min.js']);*/

        /*$element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                //$element->src =>'//vjs.zencdn.net/5.19/video.min.js']);
                //$element->src =>'https://vjs.zencdn.net/7.0/video.min.js']);
                //$element->src =>'https://vjs.zencdn.net/7.3.0/video.min.js']);
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.1.0/videojs-contrib-quality-levels.min.js']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                //$element->src =>'//vjs.zencdn.net/5.19/video.min.js']);
                //$element->src =>'https://vjs.zencdn.net/7.0/video.min.js']);
                //$element->src =>'https://vjs.zencdn.net/7.3.0/video.min.js']);
                $element->src =>'https://cdn.jsdelivr.net/npm/videojs-hls-quality-selector@1.1.1/dist/videojs-hls-quality-selector.cjs.min.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                //$element->href =>'//vjs.zencdn.net/5.19/video-js.min.css']);
                //$element->href =>'https://cdnjs.cloudflare.com/ajax/libs/videojs-overlay/1.1.4/videojs-overlay.css']);
                $element->href =>'https://players.brightcove.net/videojs-overlay/2/videojs-overlay.css']);

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                //$element->src =>'//vjs.zencdn.net/5.19/video.min.js']);
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/videojs-overlay/1.1.4/videojs-overlay.min.js']);*/
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);

        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-quality-levels/2.1.0/videojs-contrib-quality-levels.min.js']);*/

        /*$element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdn.jsdelivr.net/npm/videojs-hls-quality-selector@1.1.4/dist/videojs-hls-quality-selector.cjs.min.js']);*/

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                //$element->src =>'//vjs.zencdn.net/5.19/video.min.js']);
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js']);*/

        /*$element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.12.2/videojs-contrib-hls.min.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://api.vide.me/system/videme.css']);

        /* 17022022 $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://api.vide.me/system/test_tile.css']);*/

        /* 28102021 */
        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/videme.js']);*/
        /* 25112021 requere.js */
        /* 25112021 requere.js */$element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/require.js']);
        /* 25112021 requere.js */
        /* 25112021 requere.js */$element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/require_vide.js']);

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.0/jquery.textcomplete.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://api.vide.me/system/jquery-comments.css']);

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/jquery-comments.min.js']);*/

        $element->createTextNode($dom, $head, ['text' => "\n"]);


        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://api.vide.me/system/videojs.thumbnails.css']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);

        /* 25112021 requere.js $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://api.vide.me/system/videojs-vtt-thumbnails.min.js']);*/
        /*$element->writeSmartTag($dom, $head,
            [$element->type => $element->text_css,
                $element->href =>'https://cdnjs.cloudflare.com/ajax/libs/videojs-thumbnails/0.1.1/videojs.thumbnails.min.css']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);*/

        /*$element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->text =>'
                  var _paq = _paq || [];
  _paq.push([\'trackPageView\']);
  _paq.push([\'enableLinkTracking\']);
  (function() {
    var u="//stats.vide.me/";
    _paq.push([\'setTrackerUrl\', u+\'piwik.php\']);
    _paq.push([\'setSiteId\', 1]);
    var d=document, g=d.createElement(\'script\'), s=d.getElementsByTagName(\'script\')[0];
    g.type=\'text/javascript\'; g.async=true; g.defer=true; g.src=u+\'piwik.js\'; s.parentNode.insertBefore(g,s);
  })();
                ']);*/
        /*$noscript = $element->writeSmartTag($dom, $head,
            [$element->elementName => 'noscript']);
        $element->writeSmartTag($dom, $noscript,
            [$element->elementName => 'img',
                $element->attributeName =>'src',
                $element->attributeValue =>'//stats.vide.me/piwik.php?idsite=1',
                $element->attributeName2 =>'style',
                $element->attributeValue2 =>'border:0;',
                $element->attributeName3 =>'alt',
                $element->attributeValue3 =>''
                ]);

        $element->createTextNode($dom, $head, ['text' => "\n"]);*/
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://www.googletagmanager.com/gtag/js?id=G-CQF4RFWL8N']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            /*[$element->type => $element->text_javascript,
                $element->text =>'
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');

  ga(\'create\', \'UA-85704058-1\', \'auto\');
  ga(\'send\', \'pageview\');
                ']);*/
            [$element->type => $element->text_javascript,
                $element->text =>'
<!-- Google tag (gtag.js) -->
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());

  gtag(\'config\', \'G-CQF4RFWL8N\');']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->text =>'
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9586543274377651",
    enable_page_level_ads: true
  });
                ']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->text =>'
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter49809835 = new Ya.Metrika2({
                    id:49809835,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");']);
        
        $element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->text =>'
                  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);
  (function() {
    var u="//stats.videcdn.net/";
    _paq.push(["setTrackerUrl", u+"matomo.php"]);
    _paq.push(["setSiteId", "1"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0];
    g.async=true; g.src=u+"matomo.js"; s.parentNode.insertBefore(g,s);
  })();
']);

        $noscript = $element->writeSmartTag($dom, $head,
            [$element->elementName => 'noscript']);
        $element->writeSmartTag($dom, $noscript,
            [$element->elementName => 'img',
                $element->attributeName =>'src',
                $element->attributeValue =>'https://mc.yandex.ru/watch/49809835',
                $element->attributeName2 =>'style',
                $element->attributeValue2 =>'position:absolute;',
                $element->attributeName3 =>'alt',
                $element->attributeValue3 =>''
            ]);
        /*$element->createTextNode($dom, $head, ['text' => "\n"]);
        $element->writeSmartTag($dom, $head,
            [$element->type => $element->text_javascript,
                $element->src =>'//bdv.bidvertiser.com/BidVertiser.dbm?pid=824389&bid=1966339']);
        $element->createTextNode($dom, $head, ['text' => "\n"]);*/


        $element->writeFragmentElement($dom, $head, $HTMLsample->showBS5_darkCSS());

        $element->createTextNode($dom, $head, ['text' => "\n"]);

        $addonce = $HTMLsample->htmlNotification();
        //$addonce .= $HTMLModal->htmlModal();
//print_r($addonce);
        $body = $element->writeSmartTag($dom, $root, [$element->elementName => 'body']);
        $element->writeFragmentElement($dom, $body, $addonce);
        $element->writeSmartTag($dom, $root, [$element->elementName => 'body']);
        /* It's work, but now not wonted
        $body = $element->writeSmartTag($dom, $root, [$element->elementName => 'body']);
        $this->setVars(['body' => $body]);*/
        return $dom;
    }



}