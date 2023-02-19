<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "../components/header.php";
        require_once "../settings/db_connect.php";
        session_start();

    $category = $_GET['category'];
    $words = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `categories_words` WHERE `category` = '$category'")); ?>
    <h3><?="Категория " . $category?></h3>
    <?php
       for ($i = 0; $i < count($words); $i++) { ?>
           <p><?= $i + 1 . ") " . $words[$i][2] . " -  " . $words[$i][3]?></p>
       <?php
       }
    ?>
    <form id="add-category-form">
        <input type="text" name="category" value="<?=$category?>" style="display: none">
        <button type="submit" class="btn btn-outline-dark mt-2, mb-2">Добавить слова к себе</button>
        <div>
            <span id="add-category-mes"></span>
        </div>
    </form>

    <script>
        $('#add-category-form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "../scripts/php/user_add_category.php",
                method: 'post',
                data: $(this).serialize(),
                success: function (data) {
                    switch (data) {
                        case "Слова уже добавлены!":
                            $("#add-category-mes").addClass("text-danger");
                            $("#add-category-mes").removeClass("text-success");
                            $("#add-category-mes").text(data);
                            break;
                        default:
                            $("#add-category-mes").addClass("text-danger");
                            $("#add-category-mes").removeClass("text-success");
                            $("#add-category-mes").text(data);
                    }

                },
            })
        });
    </script>


    <?php
    $user_id = $_SESSION['user'];
    $privilege = mysqli_fetch_all(mysqli_query($connect, "SELECT `privilege` FROM `users` WHERE `users`.`id` = '$user_id' AND `privilege` = '1'"));
    if ($privilege) { ?>
    <form action="../scripts/php/delete_words_category.php" method="post">
        <input type="text" name="category" value="<?=$category?>" style="display: none">
        <button type="submit" class="btn btn-outline-dark mt-2, mb-2">Удалить категорию</button>
    </form>
    <?php
    }
    ?>



</body>
</html>