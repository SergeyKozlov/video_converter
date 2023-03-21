<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 15.08.17
 * Time: 12:23
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarPas extends Sidebar48
class SidebarPas extends Sidebar57
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return "
        " . $HTMLsample->htmlYouSign($contentInfo) . "
        " . $HTMLsample->htmlNavPas() . "
        " . $HTMLsample->htmlFooter();
    }
}