<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57V3.php');

//class SidebarShowcase extends Sidebar48
class SidebarNavV3 extends Sidebar57V3
{
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlYouSign($contentInfo) . "
        " . /*$HTMLsample->htmlShareToFB() .*/"
        " . $HTMLsample->htmlFriendsRecommended() . "
        " . $HTMLsample->htmlConnectRecommended() . "
        " . $HTMLsample->htmlTrendsNowPopular() . "
        " . $HTMLsample->htmlTrendsItems() . "
        " . /*$HTMLsample->htmlHot_Springs() .*/ "
        " . $HTMLsample->htmlHotTags() . "
        " . $HTMLsample->htmlFooter();
    }
    public function showBasis($mainHtml, $dom, $element, $sidebarReady, $navbarReady)
    {
        $html = new Html2();


        $bodyArt = $dom->getElementsByTagName('body')->item(0);
        $element->writeFragmentElement($dom, $bodyArt, $sidebarReady);

        $element->writeFragmentElement($dom, $bodyArt, $html->requiredHtml());

        /*$container = $element->writeSmartTag($dom,  $this->vars['body'],*/
        $body['container for spring header'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'videme-spring-container']);
        $body['rowProfileHeader'] = $element->writeSmartTag($dom,  $body['container for spring header'],
            [$element->class => 'videme-spring-row']);
        $body['container for 57'] = $element->writeSmartTag($dom,  $bodyArt,
            //[$element->class => 'container videme-container-for-48']);
            [$element->class => 'container-fluid pl-5 pr-5']);
        $body['row'] = $element->writeSmartTag($dom,  $body['container for 57'],
            [$element->class => 'row']);
        $body['col1'] = $element->writeSmartTag($dom,  $body['row'],
            //[$element->class => 'd-none d-md-block col-md-4 px-2 py-2']);
            //[$element->class => 'd-none d-md-block col-md-5 px-2 py-2']);
            //[$element->class => 'videme-nav-v3 d-none d-md-block col-md-5 pl-0 pr-2 bg-secondary']);
            //[$element->class => 'videme-nav-v3 d-none d-md-block pl-0 pr-2 bg-secondary']);
            [$element->class => 'videme-nav-v3 d-none d-md-block pl-0 pr-2 bg-secondary2']);
        $body['col2'] = $element->writeSmartTag($dom,  $body['row'],
            //[$element->class => 'col-md-7 col-lg-7 px-2 py-2']);
            //[$element->class => 'col-md-7 col-lg-7 pl-2 pr-0 bg-info']);
            //[$element->class => 'col pl-2 pr-0 bg-info']);
            // 03072022 [$element->class => 'col pl-2 pr-0 bg-info2 bg-white']);
            [$element->class => 'col px-0 py-2 bg-white']);
        /*$body['col3'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'd-md-none d-lg-block col-md-3 px-2 py-2']);*/
        //echo $doc3->saveHTML();
        //print_r($this->getContentInfo());

        /*        $element->writeFragmentElement($dom, $body['col1'], "
        " . $html->requiredHtml() . "
        ");*/

        $element->writeFragmentElement($dom, $body['col1'], $navbarReady);

        return $body;
    }
}