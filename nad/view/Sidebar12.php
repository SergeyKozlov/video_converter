<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 20.04.18
 * Time: 13:02
 */

class Sidebar12 extends Sidebar
{
    public function showNav($contentInfo = []){
        $HTMLsample = new baseHTMLsample();
        return      $HTMLsample->html_Album_Of_Spring() . "
                    " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlHot_Springs() . "
                    " . $HTMLsample->htmlHotTags() . "
        ";
    }
    public function showBasis($mainHtml, $dom, $element, $sidebarReady, $navbarReady)
    {

        $bodyArt = $dom->getElementsByTagName('body')->item(0);
        $element->writeFragmentElement($dom, $bodyArt, $sidebarReady);

        /*$container = $element->writeSmartTag($dom,  $this->vars['body'],*/
        $body['container'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container']);
        $body['rowProfileHeader'] = $element->writeSmartTag($dom,  $body['container'],
            [$element->class => 'row']);
        $body['row'] = $element->writeSmartTag($dom,  $body['container'],
            [$element->class => 'row']);
        $body['col1'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-3 px-2 py-2']);
        $body['col2'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-9 px-2 py-2']);
        //echo $doc3->saveHTML();
        //print_r($this->getContentInfo());

        $element->writeFragmentElement($dom, $body['col1'], $navbarReady);

        return $body;
    }
}