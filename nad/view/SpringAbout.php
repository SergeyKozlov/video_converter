<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 18.07.18
 * Time: 13:50
 */

class SpringAbout extends Spring
{
    public function showCol2($dom, $domOutput, $userInfo = '')
    {
        //print_r($userInfo);
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
    <div class='bg-white my-2 px-2 py-2'>
    " . $HTMLsample->htmlSpringAbout($userInfo) . "
    </div>
");
    }
    public function showCol3($dom, $domOutput){}
}