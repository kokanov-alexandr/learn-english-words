<?php
    require_once "../../settings/db_connect.php";
    session_start();

    $category_name = $_POST["category_name"];
    for ($i = 1; $i <= floor(count($_POST) / 2); $i++) {
        $word = $_POST["word" . $i];
        $translate = $_POST["translate" . $i];
        mysqli_query($connect, "INSERT INTO `categories_words` (`id`, `category`, `word`, `translate`) VALUES (NULL, '$category_name', '$word', '$translate');");
    }
    unset($_SESSION["categories"]);
    header("Location: ../../pages/add_words_category_form.php");