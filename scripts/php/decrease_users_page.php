<?php
    session_start();
    $_SESSION["page-users-num"]--;
    header("Location: ../../pages/all_users.php");