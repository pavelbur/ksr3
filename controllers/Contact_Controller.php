<?php

class Contact_Controller extends Controller
{
    public $model;
    public $view;
    public $content;

    function run(){
        $this->content=$this->model->ret();
        $this->view->render($this->content);
    }
}