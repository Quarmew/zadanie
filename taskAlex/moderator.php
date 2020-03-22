<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<?php
require_once 'connection.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
$news = htmlentities(mysqli_real_escape_string($link,$_POST['news']));
    

    $sql = "INSERT INTO news_tape VALUES (NULL,'$name','$news')";
    if(isset($_POST['start'])==TRUE && $news!=null){
        if(mysqli_query($link,$sql)){
            echo '<h6>Success</h6>';
        }
    }

// закрываем подключение
mysqli_close($link);
?>
<h2>Добавить новую запись</h2>
<form method="POST">
<p>Введите название:<br> 
<input type="text" name="name" /></p>
<p>Введите новость <br> 
<input type="text" name="news" /></p>
<input name="start"type="submit" value="Добавить">
</form>
</body>
</html>