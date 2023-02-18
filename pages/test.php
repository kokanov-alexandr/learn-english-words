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
        session_start();
    ?>
    <div class="mt-3 mb-5">
        <h3>Тестирование</h3>
    </div>

    <?php
    if ($_SESSION["user"] == "") { ?>
        <p>Войдите или зарегистрируйтесь!</p>
        <?php die();
    }

    $user_id = $_SESSION["user"];
    $words =  mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id' LIMIT 15"));

    $is_test_completed = false;
    $enough_words = !(count($words) < 15);

    if (!$enough_words) { ?>
        <p>Слишком мало слов для тестирования (минимум 15)!</p>
        <?php
        die();
    }
    if (isset($_POST["answer"])) {
        $_SESSION["answers"][] =  $_POST["answer"];
        if ($_POST["answer"] == $_SESSION["words"][$_SESSION["index_question"]][3]) {
            $_SESSION["correct_answers"]++;
        }
    }
    else {
        $_SESSION["answers"][] = "нет ответа";
    }

    if (!isset($_SESSION['words'])) {
        $_SESSION["count_questions"] = count($words);
        $_SESSION["index_question"] = 0;
        $_SESSION["correct_answers"] = 0;
        $_SESSION["words"] = $words;
        $_SESSION["answers"] = array();
        header("Location: ../pages/question.php");
    }

    else if ($_SESSION["index_question"] + 1 == $_SESSION["count_questions"]) { ?>
        <p><?="Результат: правильно - " . $_SESSION["correct_answers"] . " из " . $_SESSION["count_questions"]?></p>
        <p>Ваши ошибки:</p>
        <?php

        for ($i = 0; $i < count($_SESSION["words"]) - 1; $i++) {
            if ($_SESSION["answers"][$i] != $_SESSION["words"][$i][3]) { ?>
                <p><?=  ($i + 1) . ") Вопрос: " . $_SESSION["words"][$i][2] . " - ваш ответ: " . $_SESSION["answers"][$i]; ?></p>
                <p><?="Правильный ответ: " . $_SESSION["words"][$i][3]?></p>
                <?php
            }
        }
        $i = count($_SESSION["words"]) - 1;
        if ($_SESSION["words"][$i][3] != $_POST["answer"]) { ?>
            <p><?=  ($i + 1) . ") Вопрос: " . $_SESSION["words"][$i][2] . " - ваш ответ: " . $_POST["answer"]; ?></p>
            <p><?= "Правильный ответ: " . $_SESSION["words"][$i][3] ?></p>
            <?php
            }
        $is_test_completed = $_SESSION["correct_answers"] == $_SESSION["count_questions"];
        if ($is_test_completed) {
            foreach ($words as $word) {
                $date = date('Y-m-d H:i:s');
                mysqli_query($connect, "INSERT INTO `learned_words` (`id`, `user_id`, `word`, `ltanslate`, `date_learned`) VALUES (NULL, '$word[1]', '$word[2]', '$word[3]', '$date')");
                mysqli_query($connect, "DELETE FROM `unlearned_words` WHERE `unlearned_words`.`id` = '$word[0]'");
            }
            ?>
            <p>Вы успешно прошли тест, поэтому слова из теста пометились как выученные. </p>
            <p>Однако, через сутки данные слова снова будут помещены в раздел невыученных.</p>
            <?php
        }
        $but_name = $is_test_completed ?  "Ок" : "Пройти ешё раз";  ?>

        <form action="<?=$_SERVER["SCRIPT_NAME"]?>">
            <button type="submit" class="btn btn-outline-dark mt-4 mb-2"><?= $but_name ?></button>
        </form>
        <br>
        <br>
        <br>
        <?php
        unset($_SESSION["count_questions"]);
        unset($_SESSION["index_question"]);
        unset($_SESSION["correct_answers"]);
        unset($_SESSION["words"]);
        unset($_SESSION["answers"]);
    }
    else {
        $_SESSION['index_question']++;
        header("Location: ../pages/question.php");
    }
    ?>
</body>
</html>