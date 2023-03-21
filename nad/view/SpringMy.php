<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 27.06.18
 * Time: 12:13
 */

class SpringMy extends Spring
{
    public function showRowProfileHeader($dom, $domOutput, $userInfo)
    {
        $HTMLsample = $this->getHTMLsample();
        /*$modalSendToContact = new baseHTMLmodal();
        $modalShareToSign = new baseHTMLmodal();
        $modalShareToFB = new baseHTMLmodal();
        $HTMLmodalEditList = new baseHTMLmodal();*/

        //$modalShowImage = $this->getHtmlModalLG();
        /*$modalShowImage = new htmlModalLG();
        $modalShowArticle = $this->getHtmlModalLG();
        $HTMLsample->modalShareToSign($modalShareToSign);
        $HTMLsample->modalShareToFB($modalShareToFB);
        $HTMLsample->modalSendToContact($modalSendToContact);
        $HTMLsample->modalShowImage($modalShowImage);
        $HTMLsample->modalShowArticle($modalShowArticle);
        $HTMLsample->modalAlbumEdit($HTMLmodalEditList);*/

        $element = $this->getElement();
        $element->writeFragmentElement($dom, $domOutput['rowProfileHeader'], /*"
        " . $HTMLsample->modalSignIn() . "
        " .*/ $HTMLsample->htmlSpringContainerMy($userInfo) /*. "
        " . $modalShareToSign->htmlModalCommon() . "
        " . $modalShareToFB->htmlModalCommon() . "        
        " . $modalSendToContact->htmlModalCommon() . "
        " . $modalShowImage->htmlModalCommon() . "
        " . $modalShowArticle->htmlModalCommon() . "
        " . $HTMLmodalEditList->htmlModalCommon()*/
        );
    }
    public function showCol2($dom, $domOutput, $userInfo = []) // 26072022
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
    " . $HTMLsample->htmlMyLastTaskForTile() . "
    " . $HTMLsample->htmlTile() . "
    <noscript>
        <div class=\"videme-tile\" id=\"\">
            <h5>" . $userInfo['user_display_name'] . " posts</h5>" . $html->noscritpSpringPosts($userInfo) . "
        </div>
    </noscript>
</div>
");
    }
    /*public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        /!*$htmlItemscope = "";
        $htmlItemscope .= $HTMLsample->htmlShowcase();
        $htmlItemscope .= "<div class='videme-showcase-footer d-flex'>";
        $htmlItemscope .= $HTMLsample->htmlButtonShowcase();
        $htmlItemscope .= $HTMLsample->htmlButtonSocShare3B();
        //$htmlItemscope .= $HTMLsample->htmlConference($contentInfo);
        $htmlItemscope .= "</div>";*!/
        $element->writeFragmentElement($dom, $domOutput['col2'], "
    " . /!*$HTMLsample->sharePanel() .*!/ "
<div class='bg-white my-2 px-2 py-2'>
    " . /!*$HTMLsample->htmlItemscope($htmlItemscope, $contentInfo = '') .*!/ "
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile').postsOfSpringScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
</div>
");
    }*/
}