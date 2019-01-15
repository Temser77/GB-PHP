<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Задание 4 -->
    <?php
    $title = "<title>PHP - Урок 1</title>";
    $heading1 = "<h1>Создаем заголовок с помощью PHP</h1>";
    $paragraph = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet cum cumque dicta dolores magni odit perferendis voluptates! Molestias, officiis, quae.</p>";
    ?>

    <?php
    echo $title;
    ?>
</head>
<body>

<!-- Задание 2
Посмотрел, разобрался )
-->


<!-- Задание 3 -->
<!--
$a = 5;
$b = '05';

var_dump($a == $b);         // Почему true?  Поставлено 2 равно, т.е. сравнение без учета типа данных,
при этом переменная $b начиначается с цифры и интерпретатор будет приводить данное значение к типу integer,
таким образом 5 == 5

var_dump((int)'012345');     // Почему 12345?  Потому что поставлена функция преобразования данных в тип integer (int)

var_dump((float)123.0 === (int)123.0); // Почему false?  Поставлено 3 равно, т.е. сравнение происходит с учетом
типа данных, в данном случае левая часть имеет тип float, а правая тип integer, соответственно они не равны.

var_dump((int)0 === (int)'hello, world'); // Почему true? так как строка 'hello, world' не содержит цифр,
то при попытке перевести ее в integer получится 0. Типы данных и там и там integer. 0 === 0.
-->

<!-- Задание 4 -->

<?php
echo $heading1, "<br>", $paragraph;
?>


<!-- Задание 5 -->

<?php
$a = 1;
$b = 2;
$a += $b;
$b = $a - $b;
$a -= $b;
echo $a, "<br>", $b;
?>

</body>
</html>
