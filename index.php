
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
</head>
<body>
    <?php
        require_once "components/header.php";
    ?>
    <h3>Добро пожаловать на наш сайт по изучению английсих слов!</h3>
    <?php
        if ($_COOKIE["user"] == ""):
    ?>
    <h2>Авторизация</h2>
    <form action="scripts/sign_in.php" method="post">
        <input type="text" name="login" placeholder="Введите логин" class="mt-2 " style=""> <br>
        <input type="password" name="password" placeholder="Введите пароль" class="mt-2"> <br>
        <span name="auto_error"></span>
        <button type="submit" class="btn btn-outline-dark mt-2">Войти</button>
    </form>
    Ещё на зерегистрированны? <a href="pages/registration.php">Зарегистрироваться</a>
    <?php else: ?>
    <p>Привет! Чтобы выйти, нажмите <a href="scripts/sign_out.php">здесь</a></p>
    <?php endif;?>
</body>
</html>