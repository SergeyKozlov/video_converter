<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.04.18
 * Time: 20:54
 */

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');

class SpringVideo extends Spring
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $html = new baseHTMLsample();
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        /*$htmlItemscope = "";
        $htmlItemscope .= $HTMLsample->htmlShowcase();
        $htmlItemscope .= "<div class='videme-showcase-footer d-flex'>";
        $htmlItemscope .= $HTMLsample->htmlButtonShowcase();
        $htmlItemscope .= $HTMLsample->htmlButtonSocShare3B();
        //$htmlItemscope .= $HTMLsample->htmlConference($contentInfo);
        $htmlItemscope .= "</div>";*/
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white my-2 px-2 py-2'>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            //$('#videme-tile').postsOfSpringVideoOnly({});
            $('#videme-tile-spring-video').postsOfSpringVideoScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " video</h5>" . $html->noscritpSpringVideo($userInfo) . "
        </div>
    </noscript>
</div>
");
    }
}