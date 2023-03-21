<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 27.06.18
 * Time: 7:48
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarSpringMy extends Sidebar48
class SidebarSpringMy extends Sidebar57
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->html_My_Album_Of_Spring() . "
                    " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . /*$HTMLsample->htmlHot_Springs() .*/ "
                    " . $HTMLsample->htmlHotTags() . "
               " . $HTMLsample->htmlFooter();
    }
    /*public function showBasis($mainHtml, $dom, $element, $sidebarReady, $navbarReady)
    {

        $bodyArt = $dom->getElementsByTagName('body')->item(0);
        $element->writeFragmentElement($dom, $bodyArt, $sidebarReady);

        /!*$container = $element->writeSmartTag($dom,  $this->vars['body'],*!/
        $body['container'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container']);
        $body['rowProfileHeader'] = $element->writeSmartTag($dom,  $body['container'],
            [$element->class => 'row']);
        $body['row'] = $element->writeSmartTag($dom,  $body['container'],
            [$element->class => 'row']);
        $body['col1'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-3 px-2 py-2']);
        $body['col2'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-6 px-2 py-2']);
        $body['col3'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-3 px-2 py-2']);
        //echo $doc3->saveHTML();
        //print_r($this->getContentInfo());

        $element->writeFragmentElement($dom, $body['col1'], $navbarReady);

        return $body;
    }*/
}