<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 10.11.18
 * Time: 20:19
 */

class SpringViewedMy extends SpringViewed
{
    public function showRowProfileHeader($dom, $domOutput, $userInfo)
    {
        $HTMLsample = $this->getHTMLsample();
        $modalSendToContact = new baseHTMLmodal();
        $modalShareToSign = new baseHTMLmodal();
        $modalShareToFB = new baseHTMLmodal();
        //$modalShowImage = $this->getHtmlModalLG();
        $modalShowImage = new htmlModalLG();
        $modalShowArticle = $this->getHtmlModalLG();
        $HTMLsample->modalShareToSign($modalShareToSign);
        $HTMLsample->modalShareToFB($modalShareToFB);
        $HTMLsample->modalSendToContact($modalSendToContact);
        $HTMLsample->modalShowImage($modalShowImage);
        $HTMLsample->modalShowArticle($modalShowArticle);

        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['rowProfileHeader'], "
        " . $HTMLsample->modalSignIn() . "
        " . $HTMLsample->htmlSpringContainerMy($userInfo) . "
        " . $modalShareToSign->htmlModalCommon() . "
        " . $modalShareToFB->htmlModalCommon() . "        
        " . $modalSendToContact->htmlModalCommon() . "
        " . $modalShowImage->htmlModalCommon() . "
        " . $modalShowArticle->htmlModalCommon()
        );
    }
}