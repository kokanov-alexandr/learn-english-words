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
        require "../components/header.php";
        require "../settings/db_connect.php";
    ?>
    <div class="mt-3 mb-5">
        <h3>Тестирование</h3>
    </div>
    <?php
        if ($_COOKIE["user"] === "") { ?>
            <p>Войдите или зарегистрируйтесь!</p>
        <?php
        }
        if ($_POST["how-are-you"]) {
            unset($_POST["how-are-you"]) ?>
            <p>Ок</p>
            <?php
        }
         if (!isset($_POST['start-test'])) { ?>
            <form method="post">
                <button type="submit" name="start-test" id="start-test" class="btn btn-outline-dark mt-2, mb-2">Начать тестирование?</button>
            </form>
        <?php
        }
        else { ?>
            <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
                <p>Как дела?</p>
                <input type="text" name="how-are-you" class="form-control mb-2" placeholder="Расскажи про свои дела)">
                <button type="submit" class="btn btn-outline-dark mt-2, mb-2">Излить душу</button>
            </form>
        <?php
        }
        ?>
    <div>
    </div>
</body>
</html>
