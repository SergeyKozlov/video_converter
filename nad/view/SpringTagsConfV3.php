<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');

class SpringTagsConfV3 extends SpringV3
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white2 my-2 px-2 py-2'>
    <div class='videme-tile-title'>History of tags confirmed</div>
        <div class=\"\" id=\"videme-my-tagged-conf\"></div>
        " . $HTMLsample->htmlTileV3() . "
        <!--<div class=\"\" id=\"videme-v4-show-items_by-tag-tile\"></div>-->
    <script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#videme-my-tagged-conf').showMyTagsConfirmedForSpring({});
        });
      });
    </script>
</div>
");
    }
}