<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            margin: 0 auto;
            width: 800px;
        }

    </style>
</head>
<body>
<div class="container">
    <form method="get">
        <input type="text" name="firstnumber" id="firstnumber" placeholder="Введите первое число">
        <input type="text" name="secondnumber" id="secondnumber" placeholder="Введите второе число">

        <input type="submit" value="/" name="operation">
        <input type="submit" value="*" name="operation">
        <input type="submit" value="+" name="operation">
        <input type="submit" value="-" name="operation">

    </form>

    <?php
    if (!empty($_GET['operation'])) {
        $result = 0;
        switch ($_GET['operation']) {
            case '+':
                $result = $_GET['firstnumber'] + $_GET['secondnumber'];
                break;
            case '-':
                $result = $_GET['firstnumber'] - $_GET['secondnumber'];
                break;
            case '*':
                $result = $_GET['firstnumber'] * $_GET['secondnumber'];
                break;
            case '/':
                if ((int)$_GET['secondnumber'] === 0) {
                    $result = "Деление на ноль";
                    break;
                }
                $result = $_GET['firstnumber'] / $_GET['secondnumber'];
                break;
        }
        echo "Результат операции: $result";
    }
    ?>

</div>

</body>
</html>