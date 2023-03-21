<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 27.06.18
 * Time: 12:33
 */

class SpringVideoMy extends SpringVideo
{
    public function showRowProfileHeader($dom, $domOutput, $userInfo)
    {
        $HTMLsample = $this->getHTMLsample();
        /*$modalSendToContact = new baseHTMLmodal();
        $modalShareToSign = new baseHTMLmodal();
        $modalShareToFB = new baseHTMLmodal();
        //$modalShowImage = $this->getHtmlModalLG();
        $modalShowImage = new htmlModalLG();
        $modalShowArticle = $this->getHtmlModalLG();
        $HTMLsample->modalShareToSign($modalShareToSign);
        $HTMLsample->modalShareToFB($modalShareToFB);
        $HTMLsample->modalSendToContact($modalSendToContact);
        $HTMLsample->modalShowImage($modalShowImage);
        $HTMLsample->modalShowArticle($modalShowArticle);*/

        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['rowProfileHeader'], /*"
        " . $HTMLsample->modalSignIn() . "
        " .*/ $HTMLsample->htmlSpringContainerMy($userInfo) /*. "
        " . $modalShareToSign->htmlModalCommon() . "
        " . $modalShareToFB->htmlModalCommon() . "        
        " . $modalSendToContact->htmlModalCommon() . "
        " . $modalShowImage->htmlModalCommon() . "
        " . $modalShowArticle->htmlModalCommon()*/
        );
    }
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $html = new baseHTMLsample();
        $HTMLsample = $this->getHTMLsample();
        $element = $this->getElement();
        /*$htmlItemscope = "";
        $htmlItemscope .= $HTMLsample->htmlShowcase();
        $htmlItemscope .= "<div class='videme-showcase-footer d-flex'>";
        $htmlItemscope .= $HTMLsample->htmlButtonShowcase();
        $htmlItemscope .= $HTMLsample->htmlButtonSocShare3B();
        //$htmlItemscope .= $HTMLsample->htmlConference($contentInfo);
        $htmlItemscope .= "</div>";*/
        $element->writeFragmentElement($dom, $domOutput['col2'], "
<div class='bg-white my-2 px-2 py-2'>
    <script type=\"text/javascript\">
        $(document).ready(function () {
            //$('#videme-tile').postsOfSpringVideoOnly({});
            $('#videme-tile-spring-video').postsOfSpringVideoScroll({});
        });
    </script>
    " . $HTMLsample->htmlMyLastTaskForTile() . "
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " video</h5>" . $html->noscritpSpringVideo($userInfo) . "
        </div>
    </noscript>
</div>
");
    }
}