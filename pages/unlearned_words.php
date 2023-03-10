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
        session_start();
    ?>
    <div class="mt-3 mb-5">
        <h3>Невыученные слова</h3>
    </div>
    <?php
    if ($_SESSION["user"] != ""):
        $user_id = $_SESSION["user"];
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
                <form class="m-3" action="../scripts/php/delete_word.php" method="post">
                    <input type="text" name="id" value="<?=$words[$i][0]?>"  style="display:none">
                    <button type="submit" name="btn-delete-word" class="btn btn-outline-dark  mx-2 p-0 px-2"  >x</button>
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