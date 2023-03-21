<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/SidebarNavV3.php');

class SidebarPasV3 extends SidebarNavV3
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return /*"
        " . $HTMLsample->htmlYouSign($contentInfo) . "
        " .*/ $HTMLsample->htmlNavPas() . "
        " . $HTMLsample->htmlFooter();
    }
}