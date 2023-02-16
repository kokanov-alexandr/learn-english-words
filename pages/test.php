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
        if ($_COOKIE["user"] == "") { ?>
            <p>Войдите или зарегистрируйтесь!</p>
        <?php
        }
        else { ?>
            <form method="post" action="../pages/test.php">
                <button type="submit" name="start-test" id="start-test" class="btn btn-outline-dark mt-2, mb-2">Начать тестирование?</button>
            </form>
            <?php
            if (isset($_COOKIE['words'])) {
                echo "Результат: правильно - " . $_COOKIE["correct_answers"] . ", неправильно " . $_COOKIE["failed_answers"];
                setcookie("index_question", "", 0);
                setcookie("count_questions", "", 0);
                setcookie("words", "", 0);
                setcookie("correct_answers", "", 0);
                setcookie("failed_answers", "", 0);
            }
            if (isset($_POST['start-test'])) {
                $user_id = $_COOKIE["user"];
                $words =  mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id' LIMIT 15"));
                setcookie("count_questions", count($words));
                setcookie("words", serialize($words));
                setcookie("index_question", 0);
                setcookie("correct_answers", 0);
                setcookie("failed_answers", 0);
                header("Location: ../pages/question.php");
            }

        }
    ?>

    <div>
    </div>
</body>
</html>
