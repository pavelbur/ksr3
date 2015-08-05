<?php

class Controller
{
    function __construct($model,$action){
        $this->model =  $model.'_Model';
        $this->model = new $this->model;
        $this->action= $this->model->checkAction($action);
        $this->view = $model.'_View';
        $this->view = new $this->view;

    }
}