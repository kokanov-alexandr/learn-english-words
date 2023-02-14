<?php
    require "../../settings/db_connect.php";


    $word = $_POST["word"];
    $translate = $_POST["translate"];
    $id = $_COOKIE['user'];

    if (strlen($word) < 1) {
        echo "Введите слово!";
        return;
    }
    if (strlen($translate) < 1) {
        echo "Введите перевод!";
        return;
    }
    $same_words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`word` = '$word' and `unlearned_words`.`user_id` = '$id';"));
    if (count($same_words)) {
        echo "Данное слово уже добавлено!";
        return;
    }
    mysqli_query($connect, "INSERT INTO `unlearned_words` (`id`, `user_id`, `word`, `translate`) VALUES (NULL, $id, '$word', '$translate');");
