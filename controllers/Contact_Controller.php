<?php

class Contact_Controller
{
    public $model;
    public $view;
    public $content;
    function __construct($model,$action){
        $this->model =  $model.'_Model';
        $this->model = new $this->model;
        $this->view = $model.'_View';
        $this->view = new $this->view;
        $this->action= $this->model->checkAction($action);
    }
    function run(){
        $this->content=$this->model->ret();
        $this->view->render($this->content);
    }
}