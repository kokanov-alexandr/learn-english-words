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
        session_start();
        $word = $_SESSION['words'][$_SESSION['index_question']][2];
    ?>
        <form id="answer-form" action="../pages/test.php" method="post">
            <p>Вопрос № <?=$_SESSION['index_question'] + 1?> из <?=$_SESSION['count_questions']?></p>
            <p><?=$word?></p>
            <input type="text" placeholder="Введите перевод" id="answer" name="answer" class="form-control">
            <button type="submit" class="btn btn-outline-dark mt-4 mb-2">Далее</button>
        </form>
</head>
<body>
</body>
</html>