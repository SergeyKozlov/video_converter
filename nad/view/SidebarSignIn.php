<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 15.08.17
 * Time: 11:09
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarSignIn extends Sidebar48
class SidebarSignIn extends Sidebar57
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return "
" . $HTMLsample->htmlYouSign($contentInfo) /*. . "
" $HTMLsample->htmlHow_does_it_work()*/. "
               " . $HTMLsample->htmlFooter();;
    }
}