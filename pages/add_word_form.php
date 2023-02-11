<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сайт</title>
</head>
<body>
    <?php
        require_once "../components/header.php";
    ?>
    <h2>Добавление слов</h2>
    <?php
        if ($_COOKIE["user"] != ""):
    ?>
    <form action="../scripts/add_word.php" method="post">
        <input type="text" name="word" placeholder="Введите слово" class="mt-2 " style=""> <br>
        <input type="text" name="translate" placeholder="Введите перевод" class="mt-2"> <br>
        <button name type="submit" class="btn btn-outline-dark mt-2">Записать</button>
    </form>
    <?php
        else:
    ?>
    <p>Войдите или зарегистрируйтесь!</p>
    <?php
        endif;
    ?>
</body>
</html>



