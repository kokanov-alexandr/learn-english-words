<?php
    require "settings/db_connect.php";
    ?>
<div>

    <form id="ban-form">
        <p class="m-1">Заблокировать</p>
        <input type="text" name="ban-login" placeholder="Введите логин" class="form-control mb-2">
        <span id="bun-error" class="m-0"></span><br>
        <button type="submit" class="btn btn-outline-dark  mt-2" style="height: 37px">Заблокировать</button>
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
                        $("#bun-error").addClass("text-danger");
                        $("#bun-error").removeClass("text-success");
                        $("#bun-error").text(data);
                        break;
                    case "Пользователь успешно заблокирован!":
                        $("#bun-error").addClass("text-success");
                        $("#bun-error").removeClass("text-danger");
                        $("#bun-error").text(data);
                }
            }
        })
    })
</script>
<div>
    <form id="add-admin-form">
        <p>Назначить админом</p>
        <input type="text" name="admin-login" placeholder="Введите логин" class="form-control mb-2">
        <span id="admin-error" class="m-0"></span><br>
        <button type="submit" class="btn btn-outline-dark mt-2" >Назначить админом</button>
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
                    case "Пользователь уже является админом!":
                        $("#admin-error").addClass("text-danger");
                        $("#admin-error").removeClass("text-success");
                        $("#admin-error").text(data);
                        break;
                    case "Админ успешно добавлен!":
                        $("#admin-error").addClass("text-success");
                        $("#admin-error").removeClass("text-danger");
                        $("#admin-error").text(data);
                }
            }
        })
    })
</script>
    <h3>Пользователи сайта</h3>
    <?php
    $users = mysqli_fetch_all(mysqli_query($connect, "SELECT `login` FROM `users`"));

    foreach ($users as $user) { ?>
        <p><?=$user[0]?></p>
    <?php
    }
    ?>

