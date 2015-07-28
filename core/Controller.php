<?php

class Controller
{
    function __construct($model,$action){
        $this->model =  $model.'_Model';
        $this->model = new $this->model;
        $this->view = $model.'_View';
        $this->view = new $this->view;
        $this->action= $this->model->checkAction($action);
    }
}