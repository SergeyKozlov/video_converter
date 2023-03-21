<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');

//class SidebarMessageV3 extends SidebarNavV3
class SidebarMyActyvityOnly extends Sidebar57V3
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlNavMessage() . "
               " . $HTMLsample->htmlFooter();
    }
}