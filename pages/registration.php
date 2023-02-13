<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEW</title>
    <?php
        require_once "../components/header.php";
    ?>
</head>
<body>
    <div class="mt-3 mb-5">
        <h3>Регистрация</h3>
    </div>
    <form id="registrationForm">
        <div>
            <span class="text-danger" id="login-error-mes"></span>
            <input type="text" name="login" id="reg-login" placeholder="Введите логин" class="form-control" > <br>
        </div>
        <div>
            <span class="text-danger" id="pass-error-mes"></span>
            <input type="password" name="password" id="reg-password" placeholder="Введите пароль" class="form-control"> <br>
        </div>
        <div>
            <span class="text-danger" id="pass-rep-error-mes" class="m-0"></span>
            <input type="password" name="password_repeat" id="reg-password-repeat" placeholder="Повторите пароль" class="form-control"> <br>
        </div>
        <button type="submit" id="reg-btn" class="btn btn-outline-dark mt-2, mb-2">Зарегистрироваться</button>
    </form>
    <script>
        function clearErrors() {
            $("#login-error-mes").text("");
            $("#pass-error-mes").text("");
            $("#pass-rep-error-mes").text("");
        }
        $('#registrationForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '../scripts/php/create_user.php',
                method: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    clearErrors();
                    switch (data) {
                        case "Введите логин!":
                            $("#login-error-mes").text(data);
                            break;
                        case "Пароли не совпадают!":
                                case "Вы уже зарегистрированны!":
                            $("#pass-rep-error-mes").text(data);
                            break;
                        case "Введите пароль!":
                        case "Ненадёжный пароль!":
                            $("#pass-error-mes").text(data);
                            break;
                        default:
                            document.location.href = "../index.php";
                    }

                },
            })
    });
    </script>
</body>
</html>