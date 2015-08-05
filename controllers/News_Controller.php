<?php
class News_Controller extends Controller
{
    public $model;
    public $view;
    public $action;
    public $content;
    public $layout;

    function run(){
        $this->layout = new Layout;
        $this->layout->pageHeader();
        $this->content =  $this->model->getNews($this->action,IN_PAGE);//получает массив из IN_PAGE сообщений
        $this->view->render($this->content);//выводит сообщения
        $this->view->paginator($this->model->allMessage());//выводит пагинатор
        $this->layout->pageFooter();
    }
}