<?php
    $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
    $user = json_decode($s, true);
    $email = $user['email'];
    $mysql = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
    $lookupID = "SELECT Login FROM User WHERE Id_user = (SELECT Id_user FROM Patient WHERE Email = '$email')";
    $result = mysqli_query($mysql, $lookupID);
    $row = mysqli_fetch_row($result);
    $Login = $row[0];
    $mysql->close();
      
    setcookie('userL', $Login, time() + 3600, "/");
    setcookie('auth', 1, time() + 3600, "/");
    header('Location: /index.php');
    

    ?>