<?php
    session_start();

    $categories = mysqli_fetch_all(mysqli_query($connect, "SELECT DISTINCT `category` FROM `categories_words`")); ?>
    <h3>Калегории слов</h3>
    <?php
    foreach ($categories as $category) { ?>
        <h5><a href = "../pages/category.php?category=<?= $category[0]?>" ><?= $category[0] ?></a></h5>
        <?php
    }
    ?>
    <br>
