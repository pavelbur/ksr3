<?php

class News_Controller extends Controller
{
    public $model;
    public $view;
    public $action;
    public $content;

    function run(){
        $this->view->pageHeader();
        $this->content =  $this->model->getNews($this->action,IN_PAGE);//�������� ������ �� IN_PAGE ���������
        $this->view->render($this->content);//������� ���������
        $this->view->paginator($this->model->allMessage());//������� ���������
        //$this->view->renderAddMessage();//������� ����� ��� ������� ���������
        $this->view->pageFooter();

        if(!empty($_POST['message'])) {
            $this->model->addMessage(STORAGE);// ������ ������ ���������
        }
    }
}