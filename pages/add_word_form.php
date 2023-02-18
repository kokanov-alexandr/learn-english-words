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
        session_start();
    ?>
    <div class="mt-3 mb-5">
        <h3>Добавление слова</h3>
    </div>
    <?php  if ($_SESSION["user"] != ""): ?>
    <form id="add-word-form">
        <div>
            <span class="text-danger" id="word-error-mes"></span>
            <input type="text" name="word" placeholder="Введите слово" class="form-control" style=""> <br>
        </div>
        <div>
            <span class="text-danger" id="trans-error-mes"></span>
            <input type="text" name="translate" placeholder="Введите перевод" class="form-control"> <br>
        </div>
        <div>
            <span id="success-add-word"></span>
        </div>

        <button name type="submit" class="btn btn-outline-dark mt-2">Записать</button>
    </form>
    <script>
        function clearErrors() {
            $("#word-error-mes").text("");
            $("#trans-error-mes").text("");
            $("#success-add-word").text("");
        }
        $("#add-word-form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "../scripts/php/add_word.php",
                method: "post",
                data: $(this).serialize(),
                success: function (data) {
                    clearErrors();
                    switch (data) {
                        case "Введите слово!":
                            $("#word-error-mes").text(data);
                            break;
                        case "Введите перевод!":
                            $("#trans-error-mes").text(data);
                            break;
                        case "Данное слово уже добавлено!":
                            $("#success-add-word").addClass("text-danger");
                            $("#success-add-word").removeClass("text-success");
                            $("#success-add-word").text(data);
                            break;
                        default:
                            $("#success-add-word").addClass("text-success");
                            $("#success-add-word").removeClass("text-danger");
                            $("#success-add-word").text("Слово успешно добавлено!");
                    }
                }
            })
        })
    </script>
    <?php else: ?>
    <p>Войдите или зарегистрируйтесь!</p>
    <?php endif; ?>
</body>
</html>



