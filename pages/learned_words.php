<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require "../components/header.php";
        require "../settings/db_connect.php";
    ?>
    <h2>Ваши выученные слова</h2>
    <?php
    if ($_COOKIE["user"] != ""):
        $user_id = $_COOKIE["user"];
        $words = mysqli_fetch_all(mysqli_query($connect,  "SELECT * FROM `learned_words` WHERE `learned_words`.`user_id` = '$user_id'"));
        if (!count($words)) {
            echo "Здесь пока нет слов!";
        }
        for ($i = 0; $i < count($words); $i++) {
        ?>
        <p><?=$i + 1 . ") " . $words[$i][2] . " - " . $words[$i][3]?></p>
    <?php
        }
    else:
    ?>
    <p>Войдите или зарегистрируйтесь!</p>
    <?php
        endif;
    ?>
<br>
<br>
<br>
</body>
</html>