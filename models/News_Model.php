<?php

class News_Model{
    /**
     *выводит начиная со start по const возвращает массив типа
     * 0=>
     * [title=>TITLE,text=>TEXT],
     * 1=>
     * [title=>TITLE,text=>TEXT]
     */
    function getNews($start=1,$const=5 ){
        $start=($start-1)*5;
       $link= mysqli_connect('localhost','root','','test');

        $sql = "SELECT * FROM news ORDER BY id LIMIT $start,$const ";
        $result = mysqli_query($link,$sql);

        $x=[];
        while($user = mysqli_fetch_assoc($result)) {
            $x[] = $user;
        }
        return $x;


    }
    function getAll(){// массив всех сообщений возвращает int сколько всего новостей
        $link= mysqli_connect('localhost','root','','test');

        $sql = "SELECT * FROM news";
        $result = mysqli_query($link,$sql);

        $x=[];
        while($user = mysqli_fetch_assoc($result)) {
            $x[] = $user; // Вроде ковычки забыли
        }
        $ret=count($x);
        return $ret;
    }

    function addMessage($storage){ //добавляет сообщение из формы в файл
        $msg = '||' . $_POST['message'];
        file_put_contents($storage, $msg, FILE_APPEND);
        unset($_POST);
        unset($_COOKIE);
    }
    function allMessage(){//возвращает количество cтраниц
        $ret=ceil($this->getAll()/IN_PAGE);
        return $ret;
    }
    function checkAction($action){//проверка чтобы action был числом
        $action=abs((int)$action);
        if(intval($action)==0){
            $action=0;
        }
        else {
            if ($action > $this->allMessage()) {
                $action = 0;
            }
        }
        return $action;
    }
}