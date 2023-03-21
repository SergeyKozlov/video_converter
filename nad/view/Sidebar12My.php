<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 18.07.18
 * Time: 15:37
 */

class Sidebar12My extends Sidebar12
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return      $HTMLsample->html_My_Album_Of_Spring() . "
                    " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlHot_Springs() . "
                    " . $HTMLsample->htmlHotTags() . "
        ";
    }
}