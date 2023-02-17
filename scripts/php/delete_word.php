<?php
    require_once "../../settings/db_connect.php";
    $word_id = $_POST['id'];
    mysqli_query($connect, "DELETE FROM `unlearned_words` WHERE `unlearned_words`.`id` = '$word_id'");
    header("Location: ../../pages/unlearned_words.php");