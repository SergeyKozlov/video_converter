<?php
/**
 * Created by IntelliJ IDEA.
 * User: Сергей
 * Date: 05.09.2017
 * Time: 23:27
 */

class baseHTMLmodal
{
    public $modalId;
    public $modalFormId;
    public $modalFormAction;
    public $modalTitle;
    public $modalBody;
    public $modalFooter;
    public $additional;

    public function __construct()
    {
        $this->modalFooter = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
    }

    /**
     * @param mixed $modalId
     */
    public function setModalId($modalId)
    {
        $this->modalId = $modalId;
    }

    /**
     * @return mixed
     */
    public function getModalId()
    {
        return $this->modalId;
    }

    /**
     * @param mixed $modalFormId
     */
    public function setModalFormId($modalFormId)
    {
        $this->modalFormId = $modalFormId;
    }

    /**
     * @return mixed
     */
    public function getModalFormId()
    {
        return $this->modalFormId;
    }

    /**
     * @param mixed $modalFormAction
     */
    public function setModalFormAction($modalFormAction)
    {
        $this->modalFormAction = $modalFormAction;
    }

    /**
     * @return mixed
     */
    public function getModalFormAction()
    {
        return $this->modalFormAction;
    }

    /**
     * @param mixed $modalTitle
     */
    public function setModalTitle($modalTitle)
    {
        $this->modalTitle = $modalTitle;
    }

    /**
     * @return mixed
     */
    public function getModalTitle()
    {
        return $this->modalTitle;
    }

    /**
     * @param mixed $modalBody
     */
    public function setModalBody($modalBody)
    {
        $this->modalBody = $modalBody;
    }

    /**
     * @return mixed
     */
    public function getModalBody()
    {
        return $this->modalBody;
    }

    /**
     * @param mixed $modalFooter
     */
    public function setModalFooter($modalFooter)
    {
        $this->modalFooter = $modalFooter;
    }

    /**
     * @return mixed
     */
    public function getModalFooter()
    {
        return $this->modalFooter;
    }

    /**
     * @param mixed $additional
     */
    public function setAdditional($additional): void
    {
        $this->additional = $additional;
    }

    /**
     * @return mixed
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    public function htmlModalCommon()
    {
        return "
<div class=\"modal\" id=\"" . $this->getModalId() . "\" tabindex=\"-1\" role=\"dialog\">
    <form class=\"\" id=\"" . $this->getModalFormId() . "\" name=\"\" role=\"form\" 
    action=\"" . $this->getModalFormAction() . "\" method=\"post\">
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
  </form>
</div>        
";
    }

    public function htmlModal() // TOD: Delete
    {
        // global $lang, $userInfo;
        return "
        <!--
        <div class=\"modal fade vide-modal\" id=\"modal-edit-contact\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\"
     aria-hidden=\"true\">
    <form class=\"form-horizontal\" id=\"contact-edit-form\" name=\"contact-edit-form\" role=\"form\"
          action=\"https://api.vide.me/contact/update/\" method=\"post\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                        &#215;
                    </button>
                    <h4 class=\"modal-title\" id=\"\">
                        Edit contact:
                    </h4>
                </div>
                <div class=\"modal-body\">
                    <div class=\"modal-body-edit-contact\">
                        <div class=\"form-group\">
                            <label class=\"col-md-3 control-label\" for=\"newemail\">Email</label>
                            <div class=\"col-md-7\">
                                <input name=\"email\" id=\"edit-email\" value=\"\" type=\"hidden\" />
                                <input type=\"text\" class=\"form-control\" id=\"new-email\" value=\"\" name=\"newemail\" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"modal-footer-edit-contact\">
                        <button type='button'
                                class='btn btn-danger pull-left btn-sm contact-del-toggle' data-toggle='modal'
                                data-target='#modal-del-contact'>
                            <span class='glyphicon glyphicon-remove'></span> Delete
                        </button>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>
                            Сancel
                        </button>
                        <button type=\"submit\" class=\"btn btn-primary contact-edit-submit\" id=\"contact-edit-submit\"
                                name=\"contact-edit-submit\">
                            Save
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class=\"modal fade vide-modal\" id=\"modal-del-contact\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\" aria-hidden=\"true\">
    <form class=\"form-horizontal\" id=\"contact-del-form\" name=\"contact-del-form\" role=\"form\"
          action=\"https://api.vide.me/contact/remove/\" method=\"post\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                        &#215;
                    </button>
                    <h4 class=\"modal-title\" id=\"\">
                        Please confirm:
                    </h4>
                </div>
                <div class=\"modal-body\">
                    <h4>
                        Delete this contact?
                        <div class=\"videme-display\">
                        </div>
                    </h4>
                    <div class=\"modal-body-del-contact\">
                        <input name=\"email\" id=\"del-email\" value=\"\" type=\"hidden\" />
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"modal-footer-del-contact\">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>
                            Сancel
                        </button>
                        <button type=\"submit\" class=\"btn btn-danger contact-del-submit\" id=\"contact-del-submit\" name=\"contact-del-submit\">
                            <span class='glyphicon glyphicon-remove'></span> Delete
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class=\"modal fade vide-modal\" id=\"modal-create-contact\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\" aria-hidden=\"true\">
    <form class=\"form-horizontal\" id=\"contact-create-form\" name=\"contact-create-form\" role=\"form\"
          action=\"https://api.vide.me/contact/create/\" method=\"post\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                        &#215;
                    </button>
                    <h4 class=\"modal-title\" id=\"\">
                        Create contact
                    </h4>
                </div>
                <div class=\"modal-body\">
                    <div class=\"modal-body-create-contact\">
                        <div class=\"form-group\">
                            <label class=\"col-md-3 control-label\" for=\"email\">Email</label>
                            <div class=\"col-md-7\">
                                <input type=\"text\" class=\"form-control\" id=\"create-email\" value=\"\" name=\"email\" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"modal-footer-create-contact\">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>
                            Сancel
                        </button>
                        <button type=\"submit\" class=\"btn btn-primary contact-create-submit\" id=\"contact-create-submit\"
                                name=\"contact-create-submit\">
                            <span class='glyphicon glyphicon-plus'></span> Create
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<div class=\"modal fade vide-modal\" id=\"modal-edit-list\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\" aria-hidden=\"true\">
    <form class=\"form-horizontal\" id=\"list-edit-form\" name=\"list-edit-form\" role=\"form\"
          action=\"https://api.vide.me/list/update/\" method=\"post\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                        &#215;
                    </button>
                    <h4 class=\"modal-title\" id=\"\">
                        Edit list:
                    </h4>
                </div>
                <div class=\"modal-body\">
                    <div class=\"modal-body-edit-list\">
                        <div class=\"form-group\">
                            <label class=\"col-md-3 control-label\" for=\"newlist\">List</label>
                            <div class=\"col-md-7\">
                                <input name=\"list\" id=\"editlist\" value=\"\" type=\"hidden\" />
                                <input type=\"text\" class=\"form-control\" id=\"newlist\" value=\"\" name=\"newlist\" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"modal-footer-edit-list\">
                        <button type='button'
                                class='btn btn-danger pull-left btn-sm list-del-toggle' data-toggle='modal'
                                data-target='#modal-del-list'>
                            <span class='glyphicon glyphicon-remove'></span> Delete
                        </button>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>
                            Сancel
                        </button>
                        <button type=\"submit\" class=\"btn btn-primary list-edit-submit\" id=\"list-edit-submit\"
                                name=\"list-edit-submit\">
                            Save
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class=\"modal fade vide-modal\" id=\"modal-del-list\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\"
     aria-hidden=\"true\">
    <form class=\"form-horizontal\" id=\"list-del-form\" name=\"list-del-form\" role=\"form\"
          action=\"https://api.vide.me/list/remove/\" method=\"post\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                        &#215;
                    </button>
                    <h4 class=\"modal-title\" id=\"\">
                        Please confirm:
                    </h4>
                </div>
                <div class=\"modal-body\">
                    <h4>
                        Delete this album?
                        <div class=\"videme-display\">
                        </div>
                    </h4>
                    <div class=\"modal-body-del-list\">
                        <input name=\"list\" id=\"del-list\" value=\"\" type=\"hidden\" />
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"modal-footer-del-list\">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>
                            Сancel
                        </button>
                        <button type=\"submit\" class=\"btn btn-danger list-del-submit\" id=\"list-del-submit\"
                                name=\"list-del-submit\">
                            <span class='glyphicon glyphicon-remove'></span> Delete
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class=\"modal fade vide-modal\" id=\"modal-create-list\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\" aria-hidden=\"true\">
    <form class=\"form-horizontal\" id=\"list-create-form\" name=\"list-create-form\" role=\"form\" action=\"https://api.vide.me/list/create/\" method=\"post\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                        &#215;
                    </button>
                    <h4 class=\"modal-title\" id=\"\">
                        Create list
                    </h4>
                </div>
                <div class=\"modal-body\">
                    <div class=\"modal-body-create-list\">
                        <div class=\"form-group\">
                            <label class=\"col-md-3 control-label\" for=\"list\">list</label>
                            <div class=\"col-md-7\">
                                <input type=\"text\" class=\"form-control\" id=\"createlist\" value=\"\" name=\"list\" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <div class=\"modal-footer-create-list\">
                        <button type='button' class='btn btn-default' data-dismiss='modal'>
                            Сancel
                        </button>
                        <button type=\"submit\" class=\"btn btn-primary list-create-submit\" id=\"list-create-submit\"
                                name=\"list-create-submit\">
                            <span class='glyphicon glyphicon-plus'></span> Create
                            <div class=\"videme-progress\"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class=\"modal fade vide-modal\" id=\"modal-del-article\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">
                    &#215;
                </button>
                <h4 class=\"modal-title\" id=\"\">
                    Please confirm:
                </h4>
            </div>
            <div class=\"modal-body\">
                <h4>
                    <div class=\"videme-mini-img\">
                    </div>
                    Delete this article?
                </h4>
            </div>
            <div class=\"modal-footer videme-del-list\">
            </div>
        </div>
    </div>
</div>


<div class=\"modal fade\" id=\"modal-feedback\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <form class=\"\" id=\"feedback-form\" name=\"feedback-form\" role=\"form\" action=\"\" method=\"post\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                    <h4 class=\"modal-title\" id=\"myModalLabel\">On this error page</h4>
                </div>
                <div class=\"modal-body\">

                    <div class=\"form-group\">

                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" id=\"\" name=\"content\" value=\"content\" />content
                            </label>
                        </div>

                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" id=\"\" name=\"copyright\" value=\"copyright\" />copyright
                            </label>
                        </div>

                        <div class=\"checkbox\">
                            <label>
                                <input type=\"checkbox\" id=\"\" name=\"view\" value=\"view\" />view
                            </label>
                        </div>

                        <input type=\"hidden\" id=\"feedback-location\" name=\"location\" value=\"\" />
                        <label for=\"feedback-message\">message</label>
                        <textarea id=\"feedback-message\" name=\"message\" class=\"form-control\" rows=\"3\"></textarea>
                    </div>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                    <button type=\"submit\" class=\"btn btn-primary\" id=\"feedback-submit\" name=\"feedback-submit\">
                        Send
                        <div class=\"videme-progress\"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=\"modal fade\" id=\"modal-contacts\" tabindex=\"-1\" role=\"dialog\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&#215;</span></button>
                <h4 class=\"modal-title\">Contacts</h4>
            </div>
            <div class=\"modal-body\">
                <p>                
                <div class='' id='videme-showcontacts'>Contacts:</div>
                </p>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
            </div>
        </div>
    </div>
</div>-->
";
    }

}