<?php
/**
 * Created by IntelliJ IDEA.
 * User: sergey
 * Date: 25.07.17
 * Time: 17:02
 */

class Controller
{
    private $model;
    public function __construct($model) {
        $this->model = $model;
    }
    public function clicked() {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }
}