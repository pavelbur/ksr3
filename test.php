<?php
$link= mysqli_connect('localhost','root','','test');
$sql= "SELECT COUNT(*) AS id FROM news";
$ret=mysqli_query($link,$sql);
$count=mysqli_fetch_assoc($ret);
$count=(int) $count['id'];
var_dump($count);