<a href ="/news">news</a>
<?php
error_reporting(E_ALL);
define('NUMBER',5);
require 'autoload.php';

$action_name=1;
$routes = explode('/', $_SERVER['REQUEST_URI']);

if ( !empty($routes[1]) ) {
    $controller_name = $routes[1];
}
if ( !empty($routes[2]) ) {
    $action_name = $routes[2];

}



$ctr= new Controller_News($controller_name,$action_name);
$ctr->start();
?>
