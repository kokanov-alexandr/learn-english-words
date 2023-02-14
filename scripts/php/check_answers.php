<?php
    $correct_answers = 0;
    $failed_answers = 0;

    if (isset($_COOKIE['words'])) {
        echo "YES";
    }
    else {
        echo "NO";
    }
    echo "<pre>";
    print_r($_COOKIE);
    unset($_COOKIE['user']);
    echo "<pre>";
    echo "<pre>";
    print_r($_POST);
    echo "<pre>";
//    foreach ($_COOKIE['words'] as $word) {
//        if ($word[3] == $_POST[$word[1]]) {
//            $correct_answers++;
//        }
//        else {
//            $failed_answers++;
//        }
//    }
    echo "Правильных ответов : " . $correct_answers . "<br>";
    echo "Нерравильных ответов : " . $failed_answers . "<br>";