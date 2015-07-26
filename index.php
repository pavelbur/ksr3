<?php
error_reporting(E_ALL);
define('STORAGE','src/storage.txt');// архив всех сообщений
define('IN_PAGE',10);
require 'autoload.php';
$controller_name='News';
$action_name=1;

//var_dump($controller_name,$action_name);

require_once'/controllers/Controller.php';
$obj= new Controller();
?>
