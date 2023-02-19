<?php
    require_once "settings/db_connect.php";
    session_start();
?>
<form action="../pages/add_words_category_form.php">
    <button type="submit" class="btn btn-outline-dark mb-4" >Добавить категорию слов</button>
</form>
<div>
    <form id="ban-form">
        <p class="m-1">Заблокировать</p>
        <input type="text" name="ban-login" placeholder="Введите логин" class="form-control mb-2">
        <span id="bun-error" class="m-0"></span><br>
        <button type="submit" class="btn btn-outline-dark  mt-2" style="height: 37px">Заблокировать пользователя</button>
    </form>
</div>
<br>
<script>
    function clearErrors() {
        $("#ban-error").text("");
    }
    $("#ban-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "../scripts/php/add_bun.php",
            method: "post",
            data: $(this).serialize(),
            success: function (data) {
                clearErrors();
                switch (data) {
                    case "Пользователь не найден!":
                    case "Введите логин!":
                    case "Пользователь уже заблокирован!":
                    case "Невозможно заблокировать самого себя!":
                        $("#bun-error").addClass("text-danger");
                        $("#bun-error").removeClass("text-success");
                        $("#bun-error").text(data);
                        break;
                    case "Пользователь успешно заблокирован!":
                        $("#bun-error").addClass("text-success");
                        $("#bun-error").removeClass("text-danger");
                        $("#bun-error").text(data);
                    default:
                        $("#bun-error").text(data);
                }
            }
        })
    })
</script>
<div>
    <form id="add-admin-form">
        <p>Назначить администратором</p>
        <input type="text" name="admin-login" placeholder="Введите логин" class="form-control mb-2">
        <span id="admin-error" class="m-0"></span><br>
        <button type="submit" class="btn btn-outline-dark mt-2" >Назначить администратором</button>
    </form>
</div>
<br>
<script>
    function clearErrors() {
        $("#admin-error").text("");
    }
    $("#add-admin-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "../scripts/php/add_admin.php",
            method: "post",
            data: $(this).serialize(),
            success: function (data) {
                clearErrors();
                switch (data) {
                    case "Пользователь не найден!":
                    case "Введите логин!":
                    case "Пользователь уже является администратором!":
                        $("#admin-error").addClass("text-danger");
                        $("#admin-error").removeClass("text-success");
                        $("#admin-error").text(data);
                        break;
                    case "Администратор успешно добавлен!":
                        $("#admin-error").addClass("text-success");
                        $("#admin-error").removeClass("text-danger");
                        $("#admin-error").text(data);   
                }
            }
        })
    })
</script>
    <?php
        require_once "pages/last_users.php";
    ?>
