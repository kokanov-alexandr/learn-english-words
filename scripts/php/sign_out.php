<?php
    setcookie("user", $id, time() - 3600 * 12, "/");
    header("Location: /");

