<?php

class News_Model{

    function getAll(){// массив всех сообщений
        $x = file_get_contents('./src/storage.txt');
        $content = explode('||', $x);
        return $content;
    }

    function getNews($start = 0){// выводит по 10 сообщений начиная со $start
        $start=($start-1)*10;
        $x = file_get_contents('./src/storage.txt');
        $content = explode('||', $x);
        $ret = array_slice($content, $start, 10);
        return $ret;
    }

    function addMessage($storage){ //добавляет сообщение из формы в файл
        $msg = '||' . $_POST['message'];
        file_put_contents($storage, $msg, FILE_APPEND);
        //header('Location: index.php');
        //exit();
        unset($_POST);
        unset($_COOKIE);
    }
    function allMessage(){//возвращает количество cтраниц
        $ret=ceil(count($this->getAll())/IN_PAGE);
        return $ret;
    }
    function checkAction($action){//проверка чтобы action был числом
        $action=abs((int)$action);
        if(intval($action)==0){
            $action=1;
        }
        else {
            if ($action > $this->allMessage()) {
                $action = 1;
            }
        }
        return $action;
    }
}