<?php
    require_once "../settings/db_connect.php";

    $login = $_POST['login'];
    $password = hash("sha512", $_POST['password']);

    $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `users`.`login` = '$login'");
    $user = mysqli_fetch_all($query);

    if ($login == $user[0][1]) {
        if ($password == $user[0][2]) {
            $user = mysqli_fetch_all(mysqli_query($connect, "SELECT `id` FROM `users` WHERE `users`.`login` = '$login';"));
            $id = $user[0][0];
            setcookie("user", $id, time() + 3600 * 12, "/");
            header("Location: /");
        }
        else {
            echo "Неверный пароль";
        }
    }
    else {
        echo "Пользователь не найден!";
    }
