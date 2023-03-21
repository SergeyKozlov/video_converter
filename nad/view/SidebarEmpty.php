<?php


//include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarSpring extends Sidebar48
class SidebarEmpty extends Sidebar57
{
    public function showNav($contentInfo)
    {
        /*$HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlSpringSign($contentInfo) . "
               " . $HTMLsample->html_Album_Of_Spring() . "
               " . $HTMLsample->htmlShareToFB() . "
                " . $HTMLsample->htmlTrendsNowPopular() . "
                " . $HTMLsample->htmlTrendsItems() . "
                " . /!*$HTMLsample->htmlHot_Springs() .*!/ "
               " . $HTMLsample->htmlHotTags() . "
               " . $HTMLsample->htmlFooter();*/
        return '';
    }
}