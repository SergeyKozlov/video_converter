<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.04.18
 * Time: 20:44
 */

class SpringRelFromSpr extends Spring
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile').showRelationFromSpring({
                //limit: 6
            });
        });
    </script>
    <div class='bg-white my-2 px-2 py-2'>
    " . $HTMLsample->htmlTile() . "
    </div>
");
    }
    public function showCol3($dom, $domOutput){}
}