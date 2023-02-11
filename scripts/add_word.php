<?php
    require_once "../settings/db_connect.php";

    $word = $_POST["word"];
    $translate = $_POST["translate"];
    $id = $_COOKIE['user'];

    //mysqli_query($connect, "DELETE FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = 41");
    mysqli_query($connect, "INSERT INTO `unlearned_words` (`id`, `user_id`, `word`, `translate`) VALUES (NULL, $id, '$word', '$translate');");
    header("Location: ../pages/add_word_form.php");

