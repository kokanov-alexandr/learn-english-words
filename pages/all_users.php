<?php
    require_once "../components/header.php";
    require_once "../settings/db_connect.php";
    session_start();
?>
    <h3>Все пользователи</h3>
    <br>
    <?php
    require_once "../pages/users_search.php";
    if (isset($_POST["desired-login"]) != "") {
        $desired_login = $_POST["desired-login"];
        $_SESSION["users"] = mysqli_fetch_all(mysqli_query($connect, "SELECT `login` FROM `users` WHERE `login` LIKE '%$desired_login%'"));
        $_SESSION["page-users-num"] = 1;
    }
    else {
        if (!isset($_SESSION["users"])) {
            $_SESSION["users"] = mysqli_fetch_all(mysqli_query($connect, "SELECT `login` FROM `users`"));
            $_SESSION["page-users-num"] = 1;
        }
    }
    $left = ($_SESSION["page-users-num"] - 1) * 15;
    for ($i = $left; $i < $left + 15 && $i < count($_SESSION["users"]); $i++) { ?>
        <p class="bg-light"><?=$_SESSION["users"][$i][0]?></p>
        <?php
    }

    if ($_SESSION["page-users-num"] > 1) {?>
        <div style="display: flex">
            <form action="../scripts/php/decrease_users_page.php" method="post">
                <button class="btn btn-outline-dark">Предыдущая страница</button>
            </form>
            <br> <br> <br> <br>
    <?php
    }
    if ($_SESSION["page-users-num"] * 15 + 1 < count($_SESSION["users"])) { ?>
        <form action="../scripts/php/increase_users_page.php" method="post">
            <button class="btn btn-outline-dark">Следующая страница</button>
        </form>
        <br> <br> <br>
    </div>
    <?php
}
?>




