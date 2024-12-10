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

        td {
            width: 25px;
            height: 25px;
            border: 1px solid #000;
            padding: 3px;
            text-align: center;
            line-height: 25px;
        }

        table {
            border-collapse: collapse;
        }

        .firstline,
        .firstrow {
            background-color: #7abaff;
            font-weight: bold;
        }

    </style>

</head>
<body>

<h1>Задание 1</h1>
<p>С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.</p>


<?php
//Вариант 1 - Перебираем каждое 3-е число после 3.
$i = 0;
while ($i < 100) {
    if ($i >= 3) {
        echo "$i<br>";
        $i += 3;
    } else {
        $i += 1;
    }
}

/*
Вариант 2 - Перебираем все числа от 0 до 100
$i = 1;
while ($i < 100) {
    if ($i % 3 === 0) {
        echo "$i<br>";
    }
    $i += 1;
}*/
?>

<h1>Задание 2</h1>
<p>С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
    0 – это ноль.
    1 – нечетное число.
    2 – четное число.
    3 – нечетное число.
    …
    10 – четное число.
</p>

<?php
$i = 0;
do {
    if ($i === 0) {
        echo "$i - это ноль.<br>";
    } elseif ($i % 2 === 0) {
        echo "$i - это четное число.<br>";
    } else {
        echo "$i - это нечетное число.<br>";
    };
    $i += 1;
} while ($i <= 10);
?>


<h1>Задание 3</h1>
<p>Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы
    с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
    Московская область:
    Москва, Зеленоград, Клин
    Ленинградская область:
    Санкт-Петербург, Всеволожск, Павловск, Кронштадт
    Рязанская область … (названия городов можно найти на maps.yandex.ru)
</p>

<?php
$cities = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => 'Рязань' // специально здесь оставил строку, а не массив.
];

foreach ($cities as $region => $city) {
    echo "$region: <br>";
    if (is_array($city)) {
        echo implode(', ', $city);
    } else {
        echo "$city";
    }
    echo "<br>";
}
?>

<h1>Задание 4</h1>
<p>Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
    буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
    Написать функцию транслитерации строк.
</p>

<?php
$alphabet = [
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'yo',
    'ж' => 'zh',
    'з' => 'z',
    'и' => 'i',
    'й' => 'y',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'c',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'shch',
    'ъ' => '\'',
    'ы' => 'y',
    'ь' => '\'',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya',
    'А' => 'A',
    'Б' => 'B',
    'В' => 'V',
    'Г' => 'G',
    'Д' => 'D',
    'Е' => 'E',
    'Ё' => 'YO',
    'Ж' => 'ZH',
    'З' => 'Z',
    'И' => 'I',
    'Й' => 'Y',
    'К' => 'K',
    'Л' => 'L',
    'М' => 'M',
    'Н' => 'N',
    'О' => 'O',
    'П' => 'P',
    'Р' => 'R',
    'С' => 'S',
    'Т' => 'T',
    'У' => 'U',
    'Ф' => 'F',
    'Х' => 'H',
    'Ц' => 'C',
    'Ч' => 'CH',
    'Ш' => 'SH',
    'Щ' => 'SHCH',
    'Ъ' => '\'',
    'Ы' => 'Y',
    'Ь' => '\'',
    'Э' => 'E',
    'Ю' => 'YU',
    'Я' => 'YA',
];

$text = "Жили-были старик со старухой.
Вот и говорит старик старухе:
— Поди-ка, старуха, по коробу поскреби, по сусеку помети, не наскребешь ли муки на колобок.
Взяла старуха крылышко, по коробу поскребла, по сусеку помела и наскребла муки горсти две.
Замесила муку на сметане, состряпала колобок, изжарила в масле и на окошко студить положила.
Колобок полежал, полежал, взял да и покатился — с окна на лавку, с лавки на пол, пó полу к двери, прыг через порог — 
да в сени, из сеней на крыльцо, с крыльца на двор, со двора за ворота, дальше и дальше.";
echo $text;
echo '<br><br>';
function transliteration($inputString, $replacingRulesArray) {
    $outputString = $inputString;
    foreach ($replacingRulesArray as $key => $val) {
        $outputString = str_replace($key, $val, $outputString);
    }
    return $outputString;
}


echo transliteration($text, $alphabet);

?>


<h1>Задание 5</h1>
<p>Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.</p>

<?php
$textBefore = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, quaerat!";
function spaceReplace($inputString)
{
    return str_replace(' ', '_', $inputString);
}

$textAfter = spaceReplace($textBefore);
echo $textBefore;
echo '<br><br>';
echo $textAfter;
?>



<h1>Задание 7</h1>
<p>Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
    for (…){ // здесь пусто}</p>
<?php
for ($i = 0; $i < 10; print $i, $i++) {};
?>



<h1>Задание 8</h1>
<p>Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».</p>

<?php
$cities2 = [
    'Moscow region' => ['Moscow', 'Zelengrad', 'Klin'],
    'Leningradskya region' => ['Saint-Petersburg', 'Vsevolozhsk', 'Pavlovsk', 'Kronshtadt'],
    'Ryazanskaya region' => 'Ryazan'
];

echo "<strong>с русскими названиями почему-то не работает из-за кодировки</strong><br>";

foreach ($cities as $region => $city) {
    echo "$region: <br>";
    if (is_array($city)) {
        foreach ($city as $key => $val) {
            $val[0] === "K" ? print "$val" : false;
        }
    } else {
        $city[0] === "K" ? print "$city" : false;
    }
    echo "<br>";
}


foreach ($cities2 as $region => $city) {
    echo "$region: <br>";
    if (is_array($city)) {
        foreach ($city as $key => $val) {
            $val[0] === "K" ? print "$val" : false;
        }
    } else {
        $city[0] === "K" ? print "$city" : false;
    }
    echo "<br>";
}
?>

<h1>Задание 9</h1>
<p>*Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию
    и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия
    статьи в блогах).</p>

<?php
$storyName = "Сказка об Иване Царевиче";
echo $storyName . '<br>';
function replacement($inputString, $replacingRulesArray) {
    $outputString = $inputString;
    foreach ($replacingRulesArray as $key => $val) {
        $outputString = str_replace($key, $val, $outputString);
    }
    return str_replace(' ', '_', $outputString);
}

$storyNameNew = replacement($storyName, $alphabet);
echo $storyNameNew;

?>



<h1>Задание 10</h1>
<p>*Вывести при помощи 2х циклов for таблицу умножения, в углу таблицы должен стоять 0</p>

<?php
$table = "<table>";
for ($i = 0; $i < 10; $i++) {
    $table = "$table . <tr>";
    for ($j = 0; $j < 10; $j++) {
        if ($i === 0) {
            $table = "$table" . "<td class=\"firstline\">$j</td>";
        } elseif ($j === 0) {
            $table = "$table" . "<td class=\"firstrow\">$i</td>";
        } else {
            $result = $j * $i;
            $table = "$table" . "<td>$result</td>";
        }
    }
    $table = "$table . </tr>";
}
$table = "$table . </table>";
echo $table;
?>


</body>
</html>
