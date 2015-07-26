<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Guest book</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href ="../css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
<?php
class News_View{
    public $array;

    function render($arr){//выводит сообщения из массива $arr
        $this->array=$arr;
        foreach($this->array as $item){
            echo '<div class="row"><div class="col-lg-4">'.$item.'</div></div><br>';
        }
    }
    function paginator($t){
        for($i=1;$i<=$t;$i++){
            echo '<a href="/news/' . $i . '">' . $i . '</a>&nbsp;';
        }
    }
    function renderAddMessage(){ //вывод формы для добавления сообщений
        $s='<form action="index.php" method="POST" name="form">';
        $s.='<input type="text" name="message">';
        $s.='<input type="submit" name="add">';
        echo $s;
    }
}

?>

</div>
</body>
</html>