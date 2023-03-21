<?php


include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57V3.php');

//class SidebarShowcase extends Sidebar48
class SidebarSpringV3 extends Sidebar57V3
{
    public function showNav($contentInfo = []) // 27072022
    {
        $HTMLsample = new baseHTMLsample();
        return "
                " . $HTMLsample->htmlOwnerSignV3($contentInfo) . "
                    " . /*$HTMLsample->sharePanelMini() .*/"
                    " . /*$HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . $HTMLsample->htmlHotTags() .*/ "
               " . $HTMLsample->html_Album_Of_Spring() . "
               " . $HTMLsample->html_Tags_Of_Spring() . "
               " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlFooter();
    }
}