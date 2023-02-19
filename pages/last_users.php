<h3>Новые пользователи</h3>
<br>
<?php
    session_start();
    $users = mysqli_fetch_all(mysqli_query($connect, "SELECT `login` FROM `users`"));

    for ($i = count($users) - 1; $i > 0 && $i > count($users) - 6; $i--) { ?>
        <p class="bg-light"><?=$users[$i][0]?></p>
    <?php
    }
    ?>
    <form action="../pages/all_users.php" method="get" name="show-all-categories">
        <button class="btn btn-outline-dark mt-2">Показать всех пользователей</button>
    </form>
<br>




