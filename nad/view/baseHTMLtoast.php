<?php


class baseHTMLtoast
{
    public $toastId, $toastTitleId, $toastTitle, $toastTimeAgoId, $toastTimeAgo, $toastBodyId, $toastBody;

    public function __construct()
    {
        $this->toastTitle = 'Information';
    }

    /**
     * @param mixed $toastId
     */
    public function setToastId($toastId): void
    {
        $this->toastId = $toastId;
    }

    /**
     * @return mixed
     */
    public function getToastId()
    {
        return $this->toastId;
    }

    /**
     * @param mixed $toastTitleId
     */
    public function setToastTitleId($toastTitleId): void
    {
        $this->toastTitleId = $toastTitleId;
    }

    /**
     * @return mixed
     */
    public function getToastTitleId()
    {
        return $this->toastTitleId;
    }

    /**
     * @param string $toastTitle
     */
    public function setToastTitle(string $toastTitle): void
    {
        $this->toastTitle = $toastTitle;
    }

    /**
     * @return string
     */
    public function getToastTitle(): string
    {
        return $this->toastTitle;
    }

    /**
     * @param mixed $toastTimeAgoId
     */
    public function setToastTimeAgoId($toastTimeAgoId): void
    {
        $this->toastTimeAgoId = $toastTimeAgoId;
    }

    /**
     * @return mixed
     */
    public function getToastTimeAgoId()
    {
        return $this->toastTimeAgoId;
    }

    /**
     * @param mixed $toastTimeAgo
     */
    public function setToastTimeAgo($toastTimeAgo): void
    {
        $this->toastTimeAgo = $toastTimeAgo;
    }

    /**
     * @return mixed
     */
    public function getToastTimeAgo()
    {
        return $this->toastTimeAgo;
    }

    /**
     * @param mixed $toastBodyId
     */
    public function setToastBodyId($toastBodyId): void
    {
        $this->toastBodyId = $toastBodyId;
    }

    /**
     * @return mixed
     */
    public function getToastBodyId()
    {
        return $this->toastBodyId;
    }

    /**
     * @param mixed $toastBody
     */
    public function setToastBody($toastBody): void
    {
        $this->toastBody = $toastBody;
    }

    /**
     * @return mixed
     */
    public function getToastBody()
    {
        return $this->toastBody;
    }
    public function htmlToastCommon()
    {
        return "
        <!-- Flexbox container for aligning the toasts -->
<!--<div aria-live=\"polite\" aria-atomic=\"true\" class=\"d-flex justify-content-center align-items-center\">-->
<div id='" . $this->getToastId() . "' class=\"toast videme-toast\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\" data-delay=\"15000\">
  <div class=\"toast-header videme-toast-success-header\">
    <!--<img src=\"\" class=\"rounded mr-2\" alt=\"\"/>-->
    <svg class=\"bd-placeholder-img rounded me-2\" width=\"20\" height=\"20\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\"><rect width=\"100%\" height=\"100%\" fill=\"#007aff\"></rect></svg>
    <strong id='" . $this->getToastTitleId() . "' class=\"me-auto\">" . $this->getToastTitle() . "</strong>
    <small id='" . $this->getToastTimeAgoId() . "'>" . $this->getToastTimeAgo() . "</small>
    <button type=\"button\" class=\"btn-close\" data-dismiss=\"toast\" aria-label=\"Close\">
      <span aria-hidden=\"true\">&#215;</span>
    </button>
  </div>
  <div id='" . $this->getToastBodyId() . "' class=\"toast-body videme-toast-success-body\">
    " . $this->getToastBody() . "
  </div>
</div>
<!--
</div>-->
";
    }
}