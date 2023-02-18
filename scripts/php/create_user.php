<?php
    require_once '../../settings/db_connect.php';
    session_start();
    $login = $_POST['login'];
    $password =$_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $identical_logins = mysqli_fetch_all(mysqli_query($connect, "SELECT `login` FROM `users` WHERE `users`.`login` = '$login';"));

    if (strlen($login) < 1) {
        echo "Введите логин!";
        return;
    }
    if (strlen($password) < 1) {
        echo "Введите пароль!";
        return;
    }
    if (count($identical_logins)) {
        echo "Вы уже зарегистрированны!";
        return;
    }
    if (strlen($password) < 5) {
        echo "Ненадёжный пароль!";
        return;
    }
    if ($password != $password_repeat) {
        echo "Пароли не совпадают!";
        return;
    }

    $password = hash("sha512", $_POST['password']);
    mysqli_query($connect, " INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password');");
    $user = mysqli_fetch_all(mysqli_query($connect, "SELECT `id` FROM `users` WHERE `users`.`login` = '$login';"));
    $_SESSION['user'] = $user[0][0];








