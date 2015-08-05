<?php

class News_Model{

    private function connectSQL($sql){
        $link= mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
        $ret=mysqli_query($link,$sql);
        return $ret;
    }
    /**
 *выводит начиная со start по const возвращает массив типа
 * 0=>
 * [title=>TITLE,text=>TEXT],
 * 1=>
 * [title=>TITLE,text=>TEXT]
 */
    function getNews($start=1,$fin=5 ){
        $start=($start-1)*$fin;
        $result=$this->connectSQL("SELECT * FROM news ORDER BY id LIMIT $start,$fin ");
        while($user = mysqli_fetch_assoc($result)) {
            $ret[] = $user;
        }
        return $ret;
    }

    function getAll(){// массив всех сообщений возвращает int сколько всего новостей
        $sql= "SELECT COUNT(*) AS id FROM news";
       $result= $this->connectSQL($sql);
        $ret=mysqli_fetch_assoc($result);
        $ret=$ret['id'];
        return (int)$ret;
    }

    function allMessage(){//возвращает количество cтраниц
        $ret=ceil($this->getAll()/IN_PAGE);
        return $ret;
    }

    function checkAction($action){//проверка чтобы action был числом
        if(preg_match("/[0-9]/",$action)){
        }
        else{
            $action=1;
        }
        return $action;
    }
}