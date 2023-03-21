<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 04.05.18
 * Time: 12:59
 */

class SpringImage extends Spring
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
    " . /*$HTMLsample->htmlItemscope($htmlItemscope, $contentInfo = '') .*/ "
    <script type=\"text/javascript\">
        $(document).ready(function () {
            //$('#videme-tile').postsOfSpringImageOnly({});
            $('#videme-tile').postsOfSpringImageScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " image</h5>" . $html->noscritpSpringImage($userInfo) . "
        </div>
    </noscript>    
</div>
");
    }
}