<?php

class News_Controller extends Controller
{
    public $model;
    public $view;
    public $action;
    public $content;

    function run(){
        $this->view->pageHeader();
        $this->content =  $this->model->getNews($this->action,IN_PAGE);//получает массив из IN_PAGE сообщений
        $this->view->render($this->content);//выводит сообщения
        $this->view->paginator($this->model->allMessage());//выводит пагинатор
        //$this->view->renderAddMessage();//выводит форму для отпраки сообщений
        $this->view->pageFooter();

        if(!empty($_POST['message'])) {
            $this->model->addMessage(STORAGE);// запись нового сообщения
        }
    }
}