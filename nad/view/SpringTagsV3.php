<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');

class SpringTagsV3 extends SpringV3
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white2 my-2 px-2 py-2'>
<!--
Spring V3 Friends
-->
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile').showFriendsOfSpring({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
</div>
");
    }
}