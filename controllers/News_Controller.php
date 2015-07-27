<?php

class News_Controller
{
    public $model;
    public $view;
    public $action;
    public $content;
    function __construct($model,$action){
        $this->model =  $model.'_Model';
        $this->model = new $this->model;
        $this->view = $model.'_View';
        $this->view = new $this->view;
        $this->action= $this->model->checkAction($action);
    }
    function run(){
        $this->content =  $this->model->getNews($this->action);//получает массив из 10 сообщений
        $this->view->render($this->content);//выводит сообщения
        $this->view->paginator($this->model->allMessage());//выводит пагинатор
        $this->view->renderAddMessage();//выводит форму для отпраки сообщений
        if(!empty($_POST['message'])) {
            $this->model->addMessage(STORAGE);// запись нового сообщения
        }
    }
}