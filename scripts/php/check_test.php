<?php
    require "../../settings/db_connect.php";
    $id = $_COOKIE['user'];

    $words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$id' LIMIT 15"));
    $correct_answers = 0;
    $failed_answers = 0;
    foreach ($words as $word) {
        if ($word[3] === $_POST[$word[3]]) {
            $correct_answers++;
        }
        else {
            $failed_answers++;
        }
    }
    echo $correct_answers . $failed_answers;