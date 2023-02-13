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
        if ($_COOKIE["user"] != ""):
            $user_id = $_COOKIE["user"];
            $words = mysqli_fetch_all(mysqli_query($connect,  "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id'"));
            $count = (count($words) > 15 && count($words) < 20) ? count($words) : max(count($words), 15);
            if (count($words) < 4) {
                echo "Слишком мало слов для тестирования!";
            }
            else{
                echo "Тестирование";
            }
        else:
        ?>
        <p>Войдите или зарегистрируйтесь!</p>
        <?php endif; ?>
    <div>

    </div>
</body>
</html>
