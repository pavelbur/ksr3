<?php

 class Main_Controller{
     public $model;
     public $action;
     public $controller;
     function __construct(){
         $routes = explode('/', $_SERVER['REQUEST_URI']);
            if(!empty($routes[1])) {
                $this->model=$model = $routes[1];
                if(!empty($routes[2])){
                    $this->action = $routes[2];
                }else{
                    $this->action=1;
                }

            }else{
                $this->model = 'News';
                $this->action=1;
            }
      $this->controller=$this->model.'_Controller';
         $this->controller = new $this->controller($this->model,$this->action);
         $this->controller->run();//вызов метода который вызывает все методы для работы
     }

   static function error(){
        echo 'ERROR 404';
        die();
    }
} 