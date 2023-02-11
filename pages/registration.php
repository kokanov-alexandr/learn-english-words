<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <?php
        require_once "../components/header.php";
    ?>
</head>
<body>
    <h3>Регистрация</h3>
    <form action="../scripts/create_user.php" method="post">
        <input type="text" name="login" placeholder="Введите логин" class="mt-2 " style=""> <br>
        <input type="password" name="password" placeholder="Введите пароль" class="mt-2"> <br>
        <input type="password" name="password_repeat" placeholder="Повторите пароль" class="mt-2"> <br>
        <button type="submit" class="btn btn-outline-dark mt-2">Зарегистрироваться</button>
    </form>
</body>
</html>