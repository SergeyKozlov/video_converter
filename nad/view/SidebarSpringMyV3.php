<?php


include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57V3.php');

class SidebarSpringMyV3 extends Sidebar57V3
{
    public function showNav($contentInfo = []) // 27072022
    {
        $HTMLsample = new baseHTMLsample();
        /*return "
                " . $HTMLsample->htmlOwnerSignV3($contentInfo) . "
               " . $HTMLsample->html_Album_Of_Spring() . "
               " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlFooter();*/
        return $HTMLsample->htmlOwnerSignV3($contentInfo) . "
                    " . $HTMLsample->html_My_Album_Of_Spring() . "
                    " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . /*$HTMLsample->htmlHot_Springs() .*/ "
                    " . $HTMLsample->htmlHotTags() . "
               " . $HTMLsample->htmlFooter();
    }
}