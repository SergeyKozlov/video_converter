<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 13.07.18
 * Time: 8:50
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarNetwork extends Sidebar48
class SidebarNetwork extends Sidebar57
{
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlYouSign($contentInfo) . "
               " . $HTMLsample->htmlNavNetwork() . "
               " . $HTMLsample->htmlFooter();
    }
}