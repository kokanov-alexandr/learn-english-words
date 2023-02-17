<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEW</title>
</head>
<body>
    <?php
        require_once "../components/header.php";
        require_once  "../settings/db_connect.php";
    ?>
    <div class="mt-3 mb-5">
        <h3>Невыученные слова</h3>
    </div>
    <?php
    if ($_COOKIE["user"] != ""):
        $user_id = $_COOKIE["user"];
        $words = mysqli_fetch_all(mysqli_query($connect,  "SELECT * FROM `learned_words` WHERE `learned_words`.`user_id` = '$user_id'"));
        $date = date('Y-m-d H:i:s');
        foreach ($words as $word) {
            if (round((strtotime($date)) - strtotime($word[4])) / 3600 >= 24) {
                mysqli_query($connect, "DELETE FROM `learned_words` WHERE `learned_words`.`id` = '$word[0]'");
                mysqli_query($connect, "INSERT INTO `unlearned_words` (`id`, `user_id`, `word`, `translate`) VALUES (NULL, '$word[1]', '$word[2]', '$word[3]')");
            }
        }

        $words = mysqli_fetch_all(mysqli_query($connect,  "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$user_id'"));
        if (!count($words)) {
            echo "Здесь пока нет слов!";
        } ?>
    <table>
        <?php
        for ($i = 0; $i < count($words); $i++) { ?>
            <tr>
            <td><?=$i + 1 . ") " . $words[$i][2] . " - " . $words[$i][3]?></td>
            <td>
                <form action="../scripts/php/delete_word.php" method="post">
                    <input type="text" name="id" value="<?=$words[$i][0]?>"  style="display:none">
                    <button type="submit" name="btn-delete-word">X</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </table>
    <?php else: ?>
    <p>Войдите или зарегистрируйтесь!</p>
    <?php endif; ?>
    <br>
    <br>
    <br> 
</body>
</html>