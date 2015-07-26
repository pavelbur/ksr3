<?php

 class Controller{
     public $model;
     public $view;
     public $content;
     public $action;
     function __construct(){
         $routes = explode('/', $_SERVER['REQUEST_URI']);
            if(!empty($routes[1])) {
                $model = $routes[1];
                @$action = $routes[2];
            }else{
                $model = 'News';
                $action=1;
            }

         if(class_exists($model.'_Model')) {
             $this->model =  $model.'_Model';
             $this->model = new $this->model;
             $this->view = $model.'_View';
             $this->view = new $this->view;
           $this->action= $this->model->checkAction($action);

         }
         else{
             Controller::error();
         }

         $this->$model();//вызов метода который вызывает все методы для работы
     }
    function news(){
        $this->content =  $this->model->getNews($this->action);//получает массив из 10 сообщений
        $this->view->render($this->content);//выводит сообщения
        $this->view->paginator($this->model->allMessage());//выводит пагинатор
        $this->view->renderAddMessage();//выводит форму для отпраки сообщений
        if(!empty($_POST['message'])) {
            $this->model->addMessage(STORAGE);// запись нового сообщения
        }
    }


     function contact(){
        $this->content=$this->model->ret();
         $this->view->render($this->content);
     }
   static function error(){
        echo 'ERROR 404';
        die();
    }
} 