
<?php
class Contact_View
{
    function render($arr){
        foreach($arr as $key=> $val){
            echo $key.' : '.$val.'<br>';
        }
    }
}