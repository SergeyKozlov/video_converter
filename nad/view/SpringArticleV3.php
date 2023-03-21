<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');

class SpringArticleV3 extends SpringV3
{
    public function showCol2($dom, $domOutput, $userInfo = []) // 26072022
    {
        $html = new baseHTMLsample();
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white2 my-2 px-2 py-2'>
<!--
Spring V3 Articles
-->
" . $HTMLsample->htmlTileV3() . "
    <script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#videme-tile-v3').postsOfSpringArticleScrollV3({});
        });
      });
    </script>
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " video</h5>" . $html->noscritpSpringVideo($userInfo) . "
        </div>
    </noscript>
</div>
");
    }
}