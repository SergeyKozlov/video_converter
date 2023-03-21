<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57V3.php');

class SidebarEventV3 extends Sidebar57V3
{
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        return "
                " . $HTMLsample->htmlEventV3($contentInfo) . "
                    " . /*$HTMLsample->sharePanelMini() .*/"
                    " . /*$HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . $HTMLsample->htmlHotTags() . "
                    " . $HTMLsample->htmlNavMessage() .*/ "
                    " . $HTMLsample->htmlFooter();
    }
}