<?php
    session_start();

    $categories = mysqli_fetch_all(mysqli_query($connect, "SELECT DISTINCT `category` FROM `categories_words`")); ?>
    <h3>Калегории слов</h3>
    <?php
    for ($i = count($categories) - 1; $i > 0 && $i > count($categories) - 6; $i--) { ?>
        <h5><a href = "../pages/category.php?category=<?= $categories[$i][0]?>" ><?= $categories[$i][0] ?></a></h5>
        <?php
    }
    ?>
    <form action="../pages/all_categories.php" method="get" name="show-all-categories">
        <button class="btn btn-outline-dark mt-2 mb-2">Показать все категории</button>
    </form>
    <br>
