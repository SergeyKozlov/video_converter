<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');

class SpringFriendsV3 extends SpringV3
{
    public function showCol2($dom, $domOutput, $userInfo = []) // 26072022
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white2 my-2 px-2 py-2'>
<!--
Spring V3 Friends
-->
    <script type=\"text/javascript\">
      require(['jquery', 'videme_jq'], function( $ ) {
        $(document).ready(function () {
            $('#videme-tile').showFriendsOfSpring({});
        });
      });
    </script>
    " . $HTMLsample->htmlTile() . "
</div>
");
    }
}