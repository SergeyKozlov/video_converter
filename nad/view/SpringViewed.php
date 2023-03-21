<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 10.11.18
 * Time: 18:07
 */

class SpringViewed extends Spring
{
    public function showCol2($dom, $domOutput, $userInfo = [])
    {
        $HTMLsample = $this->getHTMLsample();
        $element = new Element();
        /*$htmlItemscope = "";
        $htmlItemscope .= $HTMLsample->htmlShowcase();
        $htmlItemscope .= "<div class='videme-showcase-footer d-flex'>";
        $htmlItemscope .= $HTMLsample->htmlButtonShowcase();
        $htmlItemscope .= $HTMLsample->htmlButtonSocShare3B();
        //$htmlItemscope .= $HTMLsample->htmlConference($contentInfo);
        $htmlItemscope .= "</div>";*/
        $element->writeFragmentElement($dom, $domOutput['col2'], "
    " . /*$HTMLsample->sharePanel() .*/ "
<div class='bg-white my-2 px-2 py-2'>
    " . /*$HTMLsample->htmlItemscope($htmlItemscope, $contentInfo = '') .*/ "
    <script type=\"text/javascript\">
        $(document).ready(function () {
            $('#videme-tile').postsOfSpringViewedScroll({});
        });
    </script>
    " . $HTMLsample->htmlTile() . "
</div>
");
    }
}