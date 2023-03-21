<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar48.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Sidebar57.php');

//class SidebarShowcase extends Sidebar48
class SidebarShowcaseTest11072019 extends Sidebar57
{
    public $contentInfo;

    /**
     * @param mixed $contentInfo
     */
    public function setContentInfo($contentInfo): void
    {
        $this->contentInfo = $contentInfo;
    }
    /**
     * @return mixed
     */
    public function getContentInfo()
    {
        return $this->contentInfo;
    }
    public function showNav($contentInfo = [])
    {
        $HTMLsample = new baseHTMLsample();
        $this->setContentInfo($contentInfo);
        return "
                " . /*$HTMLsample->htmlOwnerSign($contentInfo) .*/ "
                    " . /*$HTMLsample->sharePanelMini() .*/"
                    " . $HTMLsample->htmlShareToFB() . "
                    " . $HTMLsample->htmlTrendsNowPopular() . "
                    " . $HTMLsample->htmlTrendsItems() . "
                    " . $HTMLsample->htmlHotTags() . "
                    " . $HTMLsample->htmlFooter();
    }
    public function showBasis($mainHtml, $dom, $element, $sidebarReady, $navbarReady)
    {
        $html = new Html2();
        $HTMLsample = new baseHTMLsample();


        $bodyArt = $dom->getElementsByTagName('body')->item(0);
        $element->writeFragmentElement($dom, $bodyArt, $sidebarReady);

        /*$container = $element->writeSmartTag($dom,  $this->vars['body'],*/
        $body['container for spring header'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container']);
        $body['rowProfileHeader'] = $element->writeSmartTag($dom,  $body['container for spring header'],
            [$element->class => 'row']);



        $body['container for 57'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container videme-container-for-48']);
        $body['row'] = $element->writeSmartTag($dom,  $body['container for 57'],
            [$element->class => 'row']);


        //$body['container for showcase'] = $element->writeSmartTag($dom,  $bodyArt,
        /*$body['container for showcase'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-12 col-lg-12 px-2 py-2']);*/

        /*$body['container for showcase'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'container']);
        $body['row showcase'] = $element->writeSmartTag($dom,  $body['container for showcase'],
            [$element->class => 'row']);*/

        $body['col1sc'] = $element->writeSmartTag($dom,  $body['row'],
            //[$element->class => 'd-none d-md-block col-md-4 px-2 py-2']);
            [$element->class => 'd-none d-md-block col-md-4 px-2 py-2']);

        /*$contentInfo = $this->getContentInfo();
        print_r($contentInfo);

        $element->writeFragmentElement($dom, $body['col1sc'], "<div class='bg-white my-2'>
" . $HTMLsample->htmlYouSign($contentInfo) . "
        </div>");*/

        $body['col2sc'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-8 col-lg-8 px-2 py-2']);


        $body['col1'] = $element->writeSmartTag($dom,  $body['row'],
            //[$element->class => 'd-none d-md-block col-md-4 px-2 py-2']);
            [$element->class => 'd-none d-md-block col-md-6 px-2 py-2']);
        $body['col2'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'col-md-6 col-lg-6 px-2 py-2']);
        /*$body['col3'] = $element->writeSmartTag($dom,  $body['row'],
            [$element->class => 'd-md-none d-lg-block col-md-3 px-2 py-2']);*/
        //echo $doc3->saveHTML();
        //print_r($this->getContentInfo());

        $element->writeFragmentElement($dom, $body['col1'], "
" . $html->requiredHtml() . "
");

        $element->writeFragmentElement($dom, $body['col1'], $navbarReady);

        return $body;
    }
}