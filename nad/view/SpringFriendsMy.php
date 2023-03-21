<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 11.07.18
 * Time: 13:24
 */

class SpringFriendsMy extends Spring
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
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = new baseHTMLsample();

        $element = new Element();
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white my-2 px-2 py-2'>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile').showFriendsMy({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
</div>
");
    }
}