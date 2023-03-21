<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 11.07.18
 * Time: 13:15
 */

class SpringFriends extends Spring
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white my-2 px-2 py-2'>
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