<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 26.07.17
 * Time: 16:27
 */

class Sidebar
{
    public function showSidebar()
    {
        $HTMLsample = new baseHTMLsample();
        return $HTMLsample->htmlSidebar();
    }

    public function showNav($contentInfo)
    {
        $HTMLsample = new baseHTMLsample();

        return "
            <!--<div class=\"row\">-->
                <div class=\"bg-white my-2 px-2 py-2\">

        <!--<div class=\"videme-form-user-info\" id=\"nav_form_user_info\">
            <a class=\"videme-form-user-brand\" id=\"nav_user_brand\"></a>
            <a class=\"videme-form-user-hello\" id=\"nav_form_user_hello\">You:</a>
            <a class=\"videme-form-user-name\" id=\"nav_form_user_name\"></a>
            <a class=\"videme-form-user-email\" id=\"nav_form_user_email\"></a>
        </div>
        
        <div class='authorize-false'>
        <div class=\"alert alert-info\" role=\"alert\">
            <a href=\"https://api.vide.me/enter/\" class=\"alert-link\">Sign In</a></div>
        </div>-->
        
" . $HTMLsample->htmlYouSign($contentInfo) . "
                </div>
<!--
                <div class=\"bg-white my-2 px-4 py-4\">
-->

            <!--</div>-->
        ";
    }

    public function showBasis($mainHtml, $dom, $element, $sidebarReady, $navbarReady)
    {

        $bodyArt = $dom->getElementsByTagName('body')->item(0);
        $element->writeFragmentElement($dom, $bodyArt, $sidebarReady);

        /*$container = $element->writeSmartTag($dom,  $this->vars['body'],*/
        $body['container'] = $element->writeSmartTag($dom,  $bodyArt,
            [$element->class => 'container']);
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
    }
}