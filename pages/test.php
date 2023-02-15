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
        require "../components/header.php";
        require "../settings/db_connect.php";
    ?>
    <div class="mt-3 mb-5">
        <h3>Тестирование</h3>
    </div>
    <?php
        if ($_COOKIE["user"] === "") { ?>
            <p>Войдите или зарегистрируйтесь!</p>
        <?php
        }
         if (!isset($_POST['start-test'])) { ?>
            <form method="post">
                <button type="submit" name="start-test" id="start-test" class="btn btn-outline-dark mt-2, mb-2">Начать тестирование?</button>
            </form>
        <?php
        }
        else { ?>
            <form id="test-form">
                <?php
                $id = $_COOKIE['user'];
                    $words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `unlearned_words` WHERE `unlearned_words`.`user_id` = '$id' LIMIT 15"));
                    foreach ($words as $word) { ?>
                            <div class="mt-5">
                                <p><?=$word[2]?></p>
                                <input type="text" placeholder="Введите перевод" name="<?=$word[3]?>" class="form-control">
                            </div>

                    <?php
                    }
                ?>
                <button type="submit" class="btn btn-outline-dark mt-4 mb-2">Завершить тест</button>
                <p id="test-result"></p>
            </form>
         <br>
         <br>
         <br>
             <script>
                 $("#test-form").submit(function (e) {
                     e.preventDefault();
                     $.ajax({
                         url: "../scripts/php/check_test.php",
                         method: "post",
                         data: $(this).serialize(),
                         success: function (data) {
                             let text = "Правильныx ответов: " + data[0] + " / " + data[1];
                             $("#test-result").text(text);
                         }
                     })
                 })
             </script>
        <?php
        }
        ?>


    <div>
    </div>
</body>
</html>
