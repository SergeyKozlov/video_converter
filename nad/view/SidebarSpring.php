<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 20.08.17
 * Time: 1:44
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarSpring extends Sidebar48
class SidebarSpring extends Sidebar57
{
    public function showNav($contentInfo){
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlSpringSign($contentInfo) . "
               " . $HTMLsample->html_Album_Of_Spring() . "
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
            [$element->class => 'd-none d-md-block col-md-3 px-2 py-2']);
        $body['col2'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-9 col-lg-6 px-2 py-2']);
        $body['col3'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'd-md-none d-lg-block col-md-3 px-2 py-2']);
        //echo $doc3->saveHTML();
        //print_r($this->getContentInfo());

        $element->writeFragmentElement($dom, $body['col1'], $navbarReady);

        return $body;
    }*/

/*    public function showBasis($mainHtml, $dom, $element, $sidebarReady, $navbarReady)
    {

        $bodyArt = $dom->getElementsByTagName('body')->item(0);
        $element->writeFragmentElement($dom, $bodyArt, $sidebarReady);

        /!*$container = $element->writeSmartTag($dom,  $this->vars['body'],*!/
        $body['container for spring header'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container']);
        $body['rowProfileHeader'] = $element->writeSmartTag($dom,  $body['container for spring header'],
            [$element->class => 'row']);
        $body['container'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container videme-container-for-48']);
        $body['row'] = $element->writeSmartTag($dom,  $body['container'],
            [$element->class => 'row']);
        $body['col1'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'd-none d-md-block col-md-4 px-2 py-2']);
        $body['col2'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-8 col-lg-8 px-2 py-2']);
        /!*$body['col3'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'd-md-none d-lg-block col-md-3 px-2 py-2']);*!/
        //echo $doc3->saveHTML();
        //print_r($this->getContentInfo());

        $element->writeFragmentElement($dom, $body['col1'], $navbarReady);

        return $body;
    }*/
}