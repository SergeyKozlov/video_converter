<?php

include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SpringV3.php');
include_once ($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLsample.php');

class SpringTagV3 extends SpringV3
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        //print_r($userInfo);
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white2 my-2 px-2 py-2'>
    <div class='videme-tile-title'>Tag " . $_REQUEST['tag'] . " of " . $userInfo['user_display_name'] . "</div>
        <div class=\"\" id=\"videme-my-tagged-conf\"></div>
        " . $HTMLsample->htmlTileV3() . "
        <!--<div class=\"\" id=\"videme-v4-show-items_by-tag-tile\"></div>-->
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile-v3').empty().postsShowItemsByTagForSpringV4({'tag': '" . $_REQUEST['tag'] . "'});
        });
    </script>
</div>
");
    }
}