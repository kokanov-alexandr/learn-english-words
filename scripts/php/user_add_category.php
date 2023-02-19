<?php
    require_once "../../settings/db_connect.php";
    session_start();
    $category = $_POST["category"];
    $user_id = $_SESSION["user"];

    $category_words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `categories_words` WHERE `category` = '$category'"));
    $user_words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id'")) +
        mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `learned_words`"));

    $count_not_added = 0;
    foreach ($category_words as $category_word) {
        $is_added = false;
        foreach ($user_words as $user_word) {
            if ($user_word[2] == $category_word[2]) {
                $is_added = true;
                break;
            }
        }
        if (!$is_added) {
            $count_not_added++;
            mysqli_query($connect, "INSERT INTO `unlearned_words` (`id`, `user_id`, `word`, `translate`) VALUES (NULL, '$user_id', '$category_word[2]', '$category_word[3]');");
        }
    }
    if ($count_not_added) {
        echo "Слова успешно добавлены!";
    }
    else {
        echo "Слова уже добавлены!";
    }