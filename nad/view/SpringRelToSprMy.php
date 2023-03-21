<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 27.06.18
 * Time: 13:06
 */

class SpringRelToSprMy extends SpringRelToSpr
{
    public function showRowProfileHeader($dom, $domOutput, $userInfo)
    {
        $HTMLsample = $this->getHTMLsample();
        $modalSendToContact = new baseHTMLmodal();
        $modalShareToSign = new baseHTMLmodal();
        //$modalShowImage = $this->getHtmlModalLG();
        $modalShowImage = new htmlModalLG();
        $modalShowArticle = $this->getHtmlModalLG();
        $HTMLsample->modalShareToSign($modalShareToSign);
        $HTMLsample->modalSendToContact($modalSendToContact);
        $HTMLsample->modalShowImage($modalShowImage);
        $HTMLsample->modalShowArticle($modalShowArticle);

        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['rowProfileHeader'], "
        " . $HTMLsample->modalSignIn() . "
        " . $HTMLsample->htmlSpringContainerMy($userInfo) . "
        " . $modalShareToSign->htmlModalCommon() . "
        " . $modalSendToContact->htmlModalCommon() . "
        " . $modalShowImage->htmlModalCommon() . "
        " . $modalShowArticle->htmlModalCommon()
        );
    }
}