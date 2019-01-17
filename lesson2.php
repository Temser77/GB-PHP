<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        p {
            font-style: italic;
        }

        footer {
            display: flex;
            justify-content: flex-start;
            align-content: center;
            padding: 1%;
            background-color: #b2b2b2;
        }

        footer p {
            font-style: normal;
        }
    </style>

</head>
<body>

<h1>Задание 1</h1>
<p>Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт,
    который работает по следующему принципу:
    если $a и $b положительные, вывести их разность;
    если $а и $b отрицательные, вывести их произведение;
    если $а и $b разных знаков, вывести их сумму;
    Ноль можно считать положительным числом.</p>

<?php
$a = rand(-100, 100);
$b = rand(-100, 100);
$result = 0;
echo "a равно $a, b равно $b<br>";
if ($a >= 0 && $b >= 0) {
    $result = $a - $b;
    echo "Числа положительные. Разность равна $result";
} else if ($a < 0 && $b < 0) {
    $result = $a * $b;
    echo "Числа отрицательные. Произведение равно $result";
} else {
    $result = $a + $b;
    echo "Числа имеют разные знаки. Сумма равна $result";
}

?>

<h1>Задание 2</h1>
<p>Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до
    15.</p>

<?php
$c = rand(0, 15);
$result = '';
echo "a равно $c<br>";
switch ($c) {
    case 0:
        $result = $result . '0, ';
    case 1:
        $result = $result . '1, ';
    case 2:
        $result = $result . '2, ';
    case 3:
        $result = $result . '3, ';
    case 4:
        $result = $result . '4, ';
    case 5:
        $result = $result . '5, ';
    case 6:
        $result = $result . '6, ';
    case 7:
        $result = $result . '7, ';
    case 8:
        $result = $result . '8, ';
    case 9:
        $result = $result . '9, ';
    case 10:
        $result = $result . '10, ';
    case 11:
        $result = $result . '11, ';
    case 12:
        $result = $result . '12, ';
    case 13:
        $result = $result . '13, ';
    case 14:
        $result = $result . '14, ';
    case 15:
        $result = $result . '15';
        break;
    default:
        $result = 'Значение не задано';
}

echo $result;
?>

<h1>Задание 3</h1>
<p>Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор
    return.</p>

<?php
$d = rand(-100, 100);
$e = rand(-100, 100);
echo "a равно $d, b равно $e<br>";

function sum($a, $b)
{
    return $a + $b;
}

$sum = sum($d, $e);
echo "Сумма равна $sum<br>";

function sub($a, $b)
{
    return $a - $b;
}

$sub = sub($d, $e);
echo "Разность равна $sub<br>";

function multiply($a, $b)
{
    return $a * $b;
}

$multiply = multiply($d, $e);
echo "Произведение равно $multiply<br>";

function division($a, $b)
{
    return $a / $b;
}

$division = division($d, $e);
echo "Частное равно $division<br>";

?>


<h1>Задание 4</h1>
<p>Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
    где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
    В зависимости от переданного значения операции выполнить одну из арифметических операций
    (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).</p>

<?php
function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
            return sum($arg1, $arg2);
        case '-':
            return sub($arg1, $arg2);
        case '*':
            return multiply($arg1, $arg2);
        case '/':
            return division($arg1, $arg2);
        default:
            return 'invalid operation';
    }
}

$operation = mathOperation($d, $e, '+');
echo "Результат математической операции $operation<br>";
?>


<h1>Задание 5</h1>
<p>Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале
    при помощи встроенных функций PHP.</p>

<?php
$footer = file_get_contents('footer.html');
$footer = str_replace('{year}', date('Y'), $footer);
echo $footer;
?>


<h1>Задание 6</h1>
<p>С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow),
    где $val – заданное число, $pow – степень.</p>

<?php
function power($val, $pow)
{
    if ($pow === 0) {
        return 1;
    }
    return $val * power($val, ($pow - 1));
}

$value = rand(0, 10);
$power = rand(2, 3);
$powResult = power($value, $power);
echo "$value в степени $power будет равно $powResult";
?>


<h1>Задание 7</h1>
<p>Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
    22 часа 15 минут
    21 час 43 минуты</p>

<?php
$hours = date('G');
$minutes = date('i');
function findEnding($number, $word1, $word2, $word3)
{
    $lastDigit = $number % 100;
    if ($lastDigit >= 11 && $lastDigit <= 14) {
        return $word3;
    }
    $lastDigit = $number % 10;
    if ($lastDigit === 1) {
        return $word1;
    } else if ($lastDigit === 2 || $lastDigit === 3 || $lastDigit === 4) {
        return $word2;
    } else {
        return $word3;
    }
}

$hoursWord = findEnding(date('G'), 'час', 'часа', 'часов');
$minsWord = findEnding(date('i'), 'минута', 'минуты', 'минут');


echo "$hours $hoursWord $minutes $minsWord";
?>


</body>
</html>
