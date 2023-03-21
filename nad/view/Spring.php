<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.04.18
 * Time: 16:16
 */

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/Html2.php');

class Spring
{
    public function __construct()
    {
        $this->HTMLsample = new baseHTMLsample();
        $this->element = new Element();
        $this->baseHTMLmodal = new baseHTMLmodal();
        $this->htmlModalLG = new htmlModalLG();
    }

    /**
     * @param baseHTMLsample $HTMLsample
     */
    public function setHTMLsample(baseHTMLsample $HTMLsample): void
    {
        $this->HTMLsample = $HTMLsample;
    }

    /**
     * @return baseHTMLsample
     */
    public function getHTMLsample(): baseHTMLsample
    {
        return $this->HTMLsample;
    }

    /**
     * @param Element $element
     */
    public function setElement(Element $element): void
    {
        $this->element = $element;
    }

    /**
     * @return Element
     */
    public function getElement(): Element
    {
        return $this->element;
    }

    /**
     * @param baseHTMLmodal $baseHTMLmodal
     */
    public function setBaseHTMLmodal(baseHTMLmodal $baseHTMLmodal): void
    {
        $this->baseHTMLmodal = $baseHTMLmodal;
    }

    /**
     * @return baseHTMLmodal
     */
    public function getBaseHTMLmodal(): baseHTMLmodal
    {
        return $this->baseHTMLmodal;
    }

    /**
     * @param htmlModalLG $htmlModalLG
     */
    public function setHtmlModalLG(htmlModalLG $htmlModalLG): void
    {
        $this->htmlModalLG = $htmlModalLG;
    }

    /**
     * @return htmlModalLG
     */
    public function getHtmlModalLG(): htmlModalLG
    {
        return $this->htmlModalLG;
    }

    public function showRowProfileHeader($dom, $domOutput, $userInfo)
    {
        $HTMLsample = $this->getHTMLsample();
        /*$modalSendToContact = new baseHTMLmodal();
        $modalShareToSign = new baseHTMLmodal();
        $modalShareToFB = new baseHTMLmodal();
        $modalShowEmbedCode = new baseHTMLmodal();
        //$modalShowImage = $this->getHtmlModalLG();
        $modalShowImage = new htmlModalLG();
        $modalShowArticle = new htmlModalLG();
        $modalCropper = new baseHTMLmodal();
        $modalShowCopyLink = new baseHTMLmodal();
        $modalRelationDel = new baseHTMLmodal();

        $HTMLsample->modalShareToSign($modalShareToSign);
        $HTMLsample->modalShareToFB($modalShareToFB);
        $HTMLsample->modalSendToContact($modalSendToContact);
        $HTMLsample->modalShowEmbedCode($modalShowEmbedCode);

        $HTMLsample->modalShowImage($modalShowImage);
        $HTMLsample->modalShowArticle($modalShowArticle);
        $HTMLsample->modalUploadImage($modalCropper);
        $HTMLsample->modalShowCopyLink($modalShowCopyLink);

        $HTMLsample->modalFriendshipDelete($modalRelationDel);*/

        //$element = $this->getElement();
        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['rowProfileHeader'], /*"
        " . $HTMLsample->modalSignIn() . "
        " .*/ $HTMLsample->htmlSpringContainer($userInfo) /*. "
        " . $modalShareToFB->htmlModalCommon() . "
        " . $modalShareToSign->htmlModalCommon() . "
        " . $modalShowEmbedCode->htmlModalCommon() . "
        " . $modalSendToContact->htmlModalCommon() . "
        " . $modalShowImage->htmlModalCommon() . "
        " . $modalShowArticle->htmlModalCommon() . "
        " . $modalCropper->htmlModalCommon() . "
        " . $modalShowCopyLink->htmlModalCommon() . "
        " . $modalRelationDel->htmlModalCommon()*/);
    }
    public function showCol2($dom, $domOutput, $userInfo = []) // remove
    {
        $html = new baseHTMLsample();
        $element = new Element();
        $HTMLsample = $this->getHTMLsample();
        /*$htmlItemscope = "";
        $htmlItemscope .= $HTMLsample->htmlShowcase();
        $htmlItemscope .= "<div class='videme-showcase-footer d-flex'>";
        $htmlItemscope .= $HTMLsample->htmlButtonShowcase();
        $htmlItemscope .= $HTMLsample->htmlButtonSocShare3B();
        //$htmlItemscope .= $HTMLsample->htmlConference($contentInfo);
        $htmlItemscope .= "</div>";*/
        //print_r($html->noscritpSpringPosts($userInfo));
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white my-2 px-2 py-2'>
    " . /*$HTMLsample->htmlItemscope($htmlItemscope, $contentInfo = '') .*/ "
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile').postsOfSpringScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " posts</h5>" . $html->noscritpSpringPosts($userInfo) . "
        </div>
    </noscript>
</div>
");
    }
    /*public function showCol3($dom, $domOutput)
    {
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['col3'], "
                " . $HTMLsample->htmlFooter() . "
        ");
    }*/
    public function showSpring($dom, $domOutput, $userInfo = [])
    {
        //$html = new Html2();
        //$userInfo = $html->getContentInfo();

        $this->showRowProfileHeader($dom, $domOutput, $userInfo);
        $this->showCol2($dom, $domOutput, $userInfo);
        //$this->showCol3($dom, $domOutput);
    }
}