<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 05.10.18
 * Time: 22:13
 */

class SpringEvent extends Spring
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $html = new baseHTMLsample();
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white my-2 px-2 py-2'>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            //$('#videme-tile').postsOfSpringArticleOnly({});
            $('#videme-tile').postsOfSpringEventScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " events</h5>" . $html->noscritpSpringEvent($userInfo) . "
        </div>
    </noscript>    
</div>
");
    }
}