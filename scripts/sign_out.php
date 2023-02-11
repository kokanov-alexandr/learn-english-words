<?php
    setcookie("user", $login, time() - 3600 * 12, "/");
    header("Location: /");