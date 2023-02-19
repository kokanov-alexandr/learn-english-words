<?php
    require_once "../components/header.php";
    require_once "../settings/db_connect.php";
    session_start();
?>
    <h3>Все калегории слов</h3>
    <?php
    require_once "../pages/category_search.php";
    if (isset($_POST["desired-category"]) != "") {
        $desired_category = $_POST["desired-category"];
        $_SESSION["categories"] = mysqli_fetch_all(mysqli_query($connect, "SELECT DISTINCT `category` FROM `categories_words` WHERE `category` LIKE '%$desired_category%'"));
        $_SESSION["page-category-num"] = 1;
    }
    else {
        if (!isset($_SESSION["categories"])) {
            $_SESSION["categories"] = mysqli_fetch_all(mysqli_query($connect, "SELECT DISTINCT `category` FROM `categories_words`"));
            $_SESSION["page-category-num"] = 1;
        }
    }

    $left = ($_SESSION["page-category-num"] - 1) * 15;
    for ($i = $left; $i < $left + 15 && $i < count($_SESSION["categories"]); $i++) { ?>
        <h5><a href = "../pages/category.php?category=<?= $_SESSION["categories"][$i][0]?>" ><?= $_SESSION["categories"][$i][0] ?></a></h5>
        <?php
    }
    if ($_SESSION["page-category-num"] > 1) {?>
        <div style="display: flex">
            <form action="../scripts/php/decrease_word_category_page.php" method="post">
                <button class="btn btn-outline-dark">Предыдущая страница</button>
            </form>
    <?php
    }
    if ($_SESSION["page-category-num"] * 15 + 1 < count($_SESSION["categories"])) { ?>
        <form action="../scripts/php/increase_word_category_page.php" method="post">
            <button class="btn btn-outline-dark">Следующая страница</button>
        </form>
        <br> <br> <br>
        </div>
    <?php
    }
    ?>




