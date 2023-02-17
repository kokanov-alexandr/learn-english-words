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
            <?php die();
        }
        function PushCookiesArray($array_name, $value) : void {
            $array = unserialize($_COOKIE[$array_name]);
            $array[] = $value;
            setcookie($array_name, serialize($array));
        }
        $user_id = $_COOKIE["user"];
        $words =  mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id' LIMIT 15"));
        $is_test_completed = false;
        $enough_words = !(count($words) < 15);

        if (!$enough_words) { ?>
            <p>Слишком мало слов для тестирования (минимум 15)!</p>
            <?php
            die();
        }

        if (isset($_POST["answer"])) {
            PushCookiesArray("answers", $_POST["answer"]);
            if ($_POST["answer"] == unserialize($_COOKIE["words"])[$_COOKIE["index_question"]][3]) {
                setcookie("correct_answers", $_COOKIE["correct_answers"] + 1);
            }
        }
        else {
            PushCookiesArray("answers", "");
        }

        if (!isset($_COOKIE['words'])) {
            setcookie("count_questions", count($words));
            setcookie("words", serialize($words));
            setcookie("answers", array());
            setcookie("index_question", 0);
            setcookie("correct_answers", 0);
            header("Location: ../pages/question.php");
        }

        else if ($_COOKIE["index_question"] + 1 == $_COOKIE["count_questions"]) {
            $s = "";
            if ($_POST["answer"] == unserialize($_COOKIE["words"])[$_COOKIE["index_question"]][3]) {
                $s =  "Результат: правильно - " . ($_COOKIE["correct_answers"] + 1) . " из " . $_COOKIE["count_questions"];
                $is_test_completed = $_COOKIE["correct_answers"] + 1 == $_COOKIE["count_questions"];
            }
            else {
                $s = "Результат: правильно - " . $_COOKIE["correct_answers"] . " из " . $_COOKIE["count_questions"];
            }
            ?>
            <p><?=$s?></p>

            <?php
            $answers = unserialize($_COOKIE["answers"]);
            $words = unserialize($_COOKIE["words"]);

            for ($i = 0; $i < count($words) - 1; $i++) { ?>
                <p><?=  ($i + 1) . ") Вопрос: " . $words[$i][2] . " - ваш ответ: " . $answers[$i + 1]; ?></p>
            <?php
            }

            $i = count($words) - 1; ?>
            <p><?= ($i + 1) . ") Вопрос: " . $words[$i][2] . " - ваш ответ: " . $_POST["answer"]; ?></p>
            <?php

            if ($is_test_completed) {
                foreach ($words as $word) {
                    mysqli_query($connect, "INSERT INTO `learned_words` (`id`, `user_id`, `word`, `ltanslate`) VALUES (NULL, '$word[1]', '$word[2]', '$word[2]')");
                    mysqli_query($connect, "DELETE FROM `unlearned_words` WHERE `unlearned_words`.`id` = '$word[0]'");
                }
                ?>
                <p>Вы успешно прошли тест, поэтому слова из теста пометились как выученные. </p>
            <?php
            }

            $but_name = $is_test_completed ?  "Ок" : "Пройти ешё раз";  ?>

            <form action="<?=$_SERVER["SCRIPT_NAME"]?>">
                <button type="submit" class="btn btn-outline-dark mt-4 mb-2"><?= $but_name ?></button>
            </form>

        <?php
            setcookie("index_question", null, -1);
            setcookie("count_questions", null, -1);
            setcookie("words", null, -1);
            setcookie("answers", null, -1);
            setcookie("correct_answers", null, -1);
        }

        else {
            if (isset($_POST["answer"])) {
                setcookie("index_question", $_COOKIE["index_question"] + 1);
            }
            header("Location: ../pages/question.php");
        }
    ?>


    <div>
    </div>
</body>
</html>
