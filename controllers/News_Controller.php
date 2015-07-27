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
        $this->content =  $this->model->getNews($this->action);//�������� ������ �� 10 ���������
        $this->view->render($this->content);//������� ���������
        $this->view->paginator($this->model->allMessage());//������� ���������
        $this->view->renderAddMessage();//������� ����� ��� ������� ���������
        if(!empty($_POST['message'])) {
            $this->model->addMessage(STORAGE);// ������ ������ ���������
        }
    }
}