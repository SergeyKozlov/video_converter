<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');

class SidebarChartV3 extends SidebarNavV3
//class SidebarNetworkV3 extends Sidebar57V3
{
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        return /*$HTMLsample->htmlYouSign($contentInfo) . "
               " .*/ $HTMLsample->htmlNavChart() . "
               " . $HTMLsample->htmlFooter();
    }
}