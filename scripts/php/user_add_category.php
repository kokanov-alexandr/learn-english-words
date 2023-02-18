<?php
    require_once "../../settings/db_connect.php";
    session_start();
    $category = $_POST["category"];
    $user_id = $_SESSION["user"];

    $words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `categories_words` WHERE `category` = '$category'")) or die("!!!!!");

    foreach ($words as $word) {
        mysqli_query($connect, "INSERT INTO `unlearned_words` (`id`, `user_id`, `word`, `translate`) VALUES (NULL, '$user_id', '$word[2]', '$word[3]');");
    }
    header("Location: ../../index.php");