<?php
class Contact_View
{
function render($arr){
    var_dump($arr);
    foreach($arr as $key=> $val){
        echo $key.' '.$val.'<br>';
    }
}
}
echo "Gi";