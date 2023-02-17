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
        else {
            if (isset($_POST["answer"])) {
                if ($_POST["answer"] == unserialize($_COOKIE["words"])[$_COOKIE["index_question"]][3]) {
                    setcookie("correct_answers", $_COOKIE["correct_answers"] + 1);
                }
                else {
                    setcookie("failed_answers", $_COOKIE["failed_answers"] + 1);
                }
            }
            else {
                setcookie("failed_answers", $_COOKIE["failed_answers"] + 1);
            }
            if (!isset($_COOKIE['words'])) {
                $user_id = $_COOKIE["user"];
                $words =  mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id' LIMIT 15"));
                setcookie("count_questions", count($words));
                setcookie("words", serialize($words));
                setcookie("index_question", 0);
                setcookie("correct_answers", 0);
                setcookie("failed_answers", 0);
                header("Location: ../pages/question.php");
            }
            else if ($_COOKIE["index_question"] + 1 == $_COOKIE["count_questions"]) {
                if ($_POST["answer"] == unserialize($_COOKIE["words"])[$_COOKIE["index_question"]][3]) {
                    echo "Результат: правильно - " . ($_COOKIE["correct_answers"] + 1) . ", неправильно " . $_COOKIE["failed_answers"];
                }
                else {
                    echo "Результат: правильно - " . $_COOKIE["correct_answers"] . ", неправильно " . ($_COOKIE["failed_answers"] + 1);
                }
                setcookie("index_question", "", 0);
                setcookie("count_questions", "", 0);
                setcookie("words", "", 0);
                setcookie("correct_answers", "", 0);
                setcookie("failed_answers", "", 0);
            }
            else {
                setcookie("index_question", $_COOKIE["index_question"] + 1);
                header("Location: ../pages/question.php");
            }
        }
    ?>

    <div>
    </div>
</body>
</html>
