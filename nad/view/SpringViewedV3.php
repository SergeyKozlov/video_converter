<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');

class SpringViewedV3 extends SpringV3
{
    public function showCol2($dom, $domOutput, $userInfo = []) // 26072022
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        /*$htmlItemscope = "";
        $htmlItemscope .= $HTMLsample->htmlShowcase();
        $htmlItemscope .= "<div class='videme-showcase-footer d-flex'>";
        $htmlItemscope .= $HTMLsample->htmlButtonShowcase();
        $htmlItemscope .= $HTMLsample->htmlButtonSocShare3B();
        //$htmlItemscope .= $HTMLsample->htmlConference($contentInfo);
        $htmlItemscope .= "</div>";*/
        $element->writeFragmentElement($dom, $domOutput['col2'], "
    " . /*$HTMLsample->sharePanel() .*/ "
<div class='bg-white2 my-2 px-2 py-2'>
<!--
    Spring V3 Viewed
-->
" . $HTMLsample->htmlTileV3() . "
    <script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#videme-tile-v3').postsOfSpringViewedScrollV3({});
        });
      });
    </script>
    " /*. $HTMLsample->htmlTile()*/ . "
</div>
");
    }
}