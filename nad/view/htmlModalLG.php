<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 13.06.18
 * Time: 13:46
 */

class htmlModalLG extends baseHTMLmodal
{
    public function htmlModalCommon()
    {
        return "
<div class=\"modal\" id=\"" . $this->getModalId() . "\">
    <form class=\"form-horizontal\" id=\"" . $this->getModalFormId() . "\" name=\"\" role=\"form\" 
    action=\"" . $this->getModalFormAction() . "\" method=\"post\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\"> " . $this->getModalTitle() . "</h5>
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
      </div>
      <div class=\"modal-body\">
        <p>" . $this->getModalBody() . "</p>
      </div>
      <div class=\"modal-footer\">
        " . $this->getModalFooter() . "
      </div>
    </div>
  </div>
  </form>
</div>        
";
    }
}