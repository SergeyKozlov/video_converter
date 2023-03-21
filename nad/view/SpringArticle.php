<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.04.18
 * Time: 20:50
 */

class SpringArticle extends Spring
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
            $('#videme-tile').postsOfSpringArticleScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " articles</h5>" . $html->noscritpSpringArticle($userInfo) . "
        </div>
    </noscript>    
</div>
");
    }
}