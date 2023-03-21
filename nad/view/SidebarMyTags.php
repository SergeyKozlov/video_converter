<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');

//class SidebarMessageV3 extends SidebarNavV3
//class SidebarMessageV3 extends Sidebar57V3 // 09082020
class SidebarMyTags extends SidebarNavV3
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlNavMyTags() . "
               " . $HTMLsample->htmlFooter();
    }
}