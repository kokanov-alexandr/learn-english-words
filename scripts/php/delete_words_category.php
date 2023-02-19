<?php
    require_once "../../components/header.php";
    require_once "../../settings/db_connect.php";
    session_start();
    $category = $_POST['category'];
    $words = mysqli_fetch_all(mysqli_query($connect, "DELETE FROM `categories_words` WHERE `category` = '$category'"));
    header("Location: ../../index.php");

