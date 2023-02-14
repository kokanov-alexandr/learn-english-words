
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEW</title>
</head>
<body>
    <?php
        require_once "components/header.php";
    ?>
    <h2>Learn English Words!</h2>
    <?php if ($_COOKIE["user"] == ""): ?>
        <div class="mt-3 mb-5">
            <h3>Авторизация</h3>
        </div>
        <form id="sign-in-form">
            <input type="text" name="login" placeholder="Введите логин" class="form-control" style=""> <br>
            <input type="password" name="password" placeholder="Введите пароль" class="form-control"> <br>
            <div>
                <span class="text-danger" id="sign-in-error-mes"></span>
            </div>
            <button type="submit" class="btn btn-outline-dark mt-2, mb-2">Войти</button>
        </form>
        Ещё на зерегистрированны? <a href="pages/registration.php">Зарегистрироваться</a>
        <script>
            $('#sign-in-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '../scripts/php/sign_in.php',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function (data) {
                            if (data === "Введите логин!" || data === "Введите пароль!" ||
                                data === "Неверный пароль или логин!" || data === "Ваш аккаунт был заблокирован!") {
                                $("#sign-in-error-mes").text(data);
                            }
                            else {
                                location.reload();
                            }
                    },
                })
            });
        </script>
    <?php else: ?>
    <p>Привет! Чтобы выйти, нажмите <a href="scripts/php/sign_out.php">здесь</a></p>
    <?php
        require "settings/db_connect.php";
            $user_id = $_COOKIE['user'];
            $privilege = mysqli_fetch_all(mysqli_query($connect, "SELECT `privilege` FROM `users` WHERE `users`.`id` = '$user_id' AND `privilege` = '1'"));
            if ($privilege) {
                require_once "pages/admin_panel.php";
             } ?>
    <?php endif;?>
</body>
</html>