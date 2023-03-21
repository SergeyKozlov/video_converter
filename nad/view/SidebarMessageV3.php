<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');

//class SidebarMessageV3 extends SidebarNavV3
//class SidebarMessageV3 extends Sidebar57V3 // 09082020
class SidebarMessageV3 extends SidebarNavV3
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        $echo = '';
        /*return /!*$HTMLsample->htmlYouSign($contentInfo) .*!/ "
               " . $HTMLsample->htmlShowcaseVideoV3($contentInfo) . "
               " . $HTMLsample->htmlImageV3($contentInfo) . "
               " . $HTMLsample->htmlArticleV3($contentInfo) . "
               " . $HTMLsample->htmlEventV3($contentInfo) . "
               " . $HTMLsample->htmlNavMessage() . "
               " . $HTMLsample->htmlFooter();*/
        if (isset($contentInfo['type'])) {
            if ($contentInfo['type'] == 'video') $echo .= $HTMLsample->htmlShowcaseVideoV3($contentInfo);
            if ($contentInfo['type'] == 'image') $echo .= $HTMLsample->htmlImageV3($contentInfo);
            if ($contentInfo['type'] == 'article') $echo .= $HTMLsample->htmlArticleV3($contentInfo);
            if ($contentInfo['type'] == 'event') $echo .= $HTMLsample->htmlEventV3($contentInfo);
        }
        $echo .= $HTMLsample->htmlNavMessage() . "
               " . $HTMLsample->htmlFooter();
        return $echo;
    }
}