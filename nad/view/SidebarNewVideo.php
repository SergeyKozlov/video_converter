<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 26.07.17
 * Time: 16:35
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarNewVideo extends Sidebar48
class SidebarNewVideo extends Sidebar57
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlYouSign($contentInfo) . "
                    " /*. $HTMLsample->htmlHot_Springs() . "
                    " . $HTMLsample->htmlHotTags()*/;
    }
}