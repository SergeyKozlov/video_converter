<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 06.02.18
 * Time: 7:39
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarShowcase extends Sidebar48
class SidebarShowcase extends Sidebar57
{
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        return "
                " . $HTMLsample->htmlOwnerSign($contentInfo) . "
                    " . /*$HTMLsample->sharePanelMini() .*/"
                    " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . $HTMLsample->htmlHotTags() . "
                    " . $HTMLsample->htmlFooter();
    }
}