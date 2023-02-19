<?php
    session_start();
    $_SESSION["page-category-num"]--;
    header("Location: ../../pages/all_categories.php");