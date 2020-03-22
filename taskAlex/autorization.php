<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
if (isset($_POST['login']) && isset($_POST['password'])){
    $login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
    $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
$query = "SELECT user_id, user_name FROM users WHERE 'user_name' = $login AND 'user_password' = $password LIMIT 1";
$sql =  mysql_query($query) or die(mysql_errors());
if(mysql_num_rows($sql) == 1){
    if (mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_assoc($sql);
                //ставим метку в сессии 
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                //ставим куки и время их хранения 10 дней
                setcookie("CookieMy", $row['user_name'], time()+60*60*24*10);       
   }
    else {
                header("Location: control_panel.php"); 
    }
   }
   if (isset($_SESSION['user_id'])){
    header('Location: control_panel.php');
    } else {
        $login = '';
        if(isset($_COOKIE['CookieMy'])){
            $login = htmlspecialchars($_COOKIE['CookieMy']);
        }
    }
}
?>
</body>
</html>
