<?php
/**
 * Created by IntelliJ IDEA.
 * User: Сергей
 * Date: 07.09.2017
 * Time: 19:18
 */

class HtmlModalSimple extends baseHTMLmodal
{
public function htmlModalCommon()
{
    return "
<div class=\"modal\" id=\"" . $this->getModalId() . "\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\">" . $this->getModalTitle() . "</h5>
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
</div>
    ";
}
}