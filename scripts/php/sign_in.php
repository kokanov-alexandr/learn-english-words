<?php
    require_once "../../settings/db_connect.php";
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `users`.`login` = '$login'");
    $user = mysqli_fetch_all($query);

    if (strlen($login) < 1) {
        echo "Введите логин!";
        return;
    }
    if (strlen($password) < 1) {
        echo "Введите пароль!";
        return;
    }

    if ($user[0][4] == 1) {
        echo "Ваш аккаунт был заблокирован!";
        return;
    }
    $password = hash("sha512", $_POST['password']);
    if ($login != $user[0][1] || $password != $user[0][2]) {
        echo "Неверный пароль или логин!";
        return;
    }

    $user = mysqli_fetch_all(mysqli_query($connect, "SELECT `id` FROM `users` WHERE `users`.`login` = '$login';"));
    $_SESSION["user"] =  $user[0][0];
