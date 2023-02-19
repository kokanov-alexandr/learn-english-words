<?php
    require_once "../components/header.php"; ?>
    <h3>Добавление категоиию слов</h3>

<script>
    function AddQuestion() {
        let inputs = document.querySelectorAll('input[type="text"]')
        let lastNum = ((inputs[inputs.length-1]).getAttribute('name'));
        if (lastNum.length > 10) {
            lastNum = lastNum[9] + lastNum[10];
        }
        else {
            lastNum = lastNum[9];
        }
        let nextNum = Number(lastNum) + 1;

        let elem1 = document.createElement("p");
        elem1.innerHTML = `Слово ${nextNum} <input type="text" id="word${nextNum}" name="word${nextNum}" class="form-control"/>`;

        let elem2 = document.createElement("p");
        elem2.innerHTML = `Перевод ${nextNum} <input type="text" id="translate${nextNum}" name="translate${nextNum}" class="form-control"/>`;

        let parentGuest = document.getElementById("translate"+lastNum);
        parentGuest.parentNode.insertBefore(elem2, parentGuest.nextSibling);
        parentGuest.parentNode.insertBefore(elem1, parentGuest.nextSibling);
    }
</script>

<form action="../scripts/php/add_words_category.php" id="myform" method="post">
    <div>
        <p>Название категории</p>
        <input name="category_name" class="form-control">
        <p>Слово 1:</p>
        <input type="text" id="word1" name="word1" class="form-control"/>
        <p>Перевод 1:</p>
        <input type="text" id="translate1" name="translate1" class="form-control"/>
    </div>
    <p><button type="button"  onclick="AddQuestion()" id="but_add" class="btn btn-outline-dark mt-2 mb-2"/>Добавить слово</button></p>
    <p><input type="submit" class="btn btn-outline-dark mt-2 mb-2" /></p>
</form>
