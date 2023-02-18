<?php
    require_once "../../settings/db_connect.php";
    session_start();
    $login = $_POST["admin-login"];

    if (strlen($login) < 1) {
        echo "Введите логин!";
        return;
    }

    $user = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `users` WHERE `users`.`login` = '$login'"));

    if (empty($user)) {
        echo "Пользователь не найден!";
        return;
    }

    if ($user[0][3] == 1) {
        echo "Пользователь уже является администратором!";
        return;
    }
    if (mysqli_query($connect, "UPDATE `users` SET `users`.`privilege` = '1' WHERE `users`.`login` = '$login'")) {
        echo "Администратор успешно добавлен!";
    }
