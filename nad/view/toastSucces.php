<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLtoast.php');

class toastSucces extends baseHTMLtoast
{
    public function htmlToastCommon()
    {
        return "
        <!-- Flexbox container for aligning the toasts -->
<!--<div aria-live=\"polite\" aria-atomic=\"true\" class=\"d-flex justify-content-center align-items-center\">-->
<div id='" . $this->getToastId() . "' class=\"toast videme-toast\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\" data-delay=\"1500\">
  <div class=\"toast-header\">
    <!--<img src=\"\" class=\"rounded mr-2\" alt=\"\"/>-->
    <svg class=\"bd-placeholder-img rounded me-2\" width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\"><rect width=\"100%\" height=\"100%\" fill=\"#007aff\"></rect></svg>
    <strong id='" . $this->getToastTitleId() . "' class=\"me-auto\">" . $this->getToastTitle() . "</strong>
    <small id='" . $this->getToastTimeAgoId() . "'>" . $this->getToastTimeAgo() . "</small>
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button>
  </div>
  <div id='" . $this->getToastBodyId() . "' class=\"toast-body\">
    " . $this->getToastBody() . "
  </div>
</div>
<!--
</div>-->
";
    }
}