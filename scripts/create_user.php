<?php
    require_once "../settings/db_connect.php";

    $login = $_POST['login'];
    $password = hash("sha512", $_POST['password']);
    $password_repeat = hash("sha512", $_POST['password_repeat']);
    $identical_logins = mysqli_fetch_all(mysqli_query($connect, "SELECT `login` FROM `users` WHERE `users`.`login` = '$login';"));

    if ($password != $password_repeat) {
        echo "Пароли не совпадают!";
    }
    else if (count($identical_logins)) {
        echo "Вы уже зарегестрированны!";
    }
    else {
        mysqli_query($connect, " INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password');");
        $user = mysqli_fetch_all(mysqli_query($connect, "SELECT `id` FROM `users` WHERE `users`.`login` = '$login';"));
        $id = $user[0][0];
        setcookie("user", strval($id), time() + 3600 * 12, "/");
        header("Location: /");
    }







