<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        require_once "../components/header.php";
        require_once "../settings/db_connect.php";
        $word = unserialize($_COOKIE['words'])[$_COOKIE['index_question']][2];
        $button_name = "";
        $path = "";

        if ($_COOKIE["index_question"] + 1 >= $_COOKIE["count_questions"]) {
            $button_name = "Завершить тест";
            $path = "../pages/test.php";
        }
        else {
            $button_name = "Далее";
            $path = "../pages/question.php";
        }
        ?>
        <form action="<?=$path?>" method="post">
            <p>Вопрос № <?=$_COOKIE['index_question'] + 1?> из <?=$_COOKIE['count_questions']?></p>
            <p><?=$word?></p>
            <input type="text" placeholder="Введите перевод" name="answer" class="form-control">
            <button type="submit" class="btn btn-outline-dark mt-4 mb-2"><?=$button_name?></button>
        </form>
        <?php
        if (isset($_POST['answer'])) {
            if ($_POST['answer'] == unserialize($_COOKIE['words'])[$_COOKIE['index_question']][3]) {
                setcookie("correct_answers", $_COOKIE["correct_answers"] + 1);
            }
            else {
                setcookie("failed_answers", $_COOKIE["failed_answers"] + 1);
            }
        }
        else {
            setcookie("failed_answers", $_COOKIE["failed_answers"] + 1);
        }
        setcookie("index_question", $_COOKIE["index_question"] + 1);

    ?>
</head>
<body>

</body>
</html>