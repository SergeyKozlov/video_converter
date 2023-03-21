<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/nad/view/baseHTMLmodal.php');

class ModalNoForm extends baseHTMLmodal
{
    public function htmlModalCommon()
    {
        return "
<div class=\"modal\" id=\"" . $this->getModalId() . "\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\"> " . $this->getModalTitle() . "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        " . $this->getModalBody() . "
      </div>
      <div class=\"modal-footer\">
        " . $this->getModalFooter() . "
      </div>
    </div>
  </div>
</div>        
";
    }
}