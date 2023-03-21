<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57V3.php');

class SidebarArticleV3 extends Sidebar57V3
{
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        return "
                " . $HTMLsample->htmlArticleV3($contentInfo) . "
                    " . /*$HTMLsample->sharePanelMini() .*/"
                    " . /*$HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . $HTMLsample->htmlHotTags() . "
                    " . $HTMLsample->htmlNavMessage() .*/ "
                    " . $HTMLsample->htmlFooter();
    }
}