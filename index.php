<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <style>
        .galleryWrapper__screen {
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #222;
            opacity: 0.8;
            position: fixed;
            top: 0;
            z-index: 100;
            display: block;
            text-align: center;
        }

        .galleryWrapper__image {
            max-height: 80%;
            max-width: 80%;
            z-index: 101;
            position: absolute;
            margin: auto;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
        }

        .galleryWrapper__close {
            z-index: 101;
            position: absolute;
            top: 1%;
            right: 1%;
            height: 3%;
        }

        .galleryWrapper__switchPicRight,
        .galleryWrapper__switchPicLeft {
            text-decoration: none;
            position: absolute;
            z-index: 101;
            top: 48%;
            font-size: 2em;
            color: darkgrey;
            font-weight: bolder;
            transform: scaleY(2);
        }

        .galleryWrapper__switchPicLeft {
            left: 2%;
        }

        .galleryWrapper__switchPicRight {
            right: 2%;

        }

        img:hover,
        a:hover {
            cursor: pointer;
        }

        p {
            padding-left: 25px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<br>
<br>

<?php
$id = (int)$_GET['id'];
$reviews = (int)$_GET['reviews'];
$link = mysqli_connect('localhost', 'root',
    'root', 'gbphp', '3306', 'MySQL');
if (empty($id)) {
    echo "<a href=\"index.php\">Refresh</a><br><br>";

    $sqlSelect = "SELECT * FROM images;";
    $result = mysqli_query($link, $sqlSelect);
    while ($row = mysqli_fetch_assoc($result)) {
        echo <<<php
        <a href="?id={$row['id']}&reviews={$row['reviews']}">
        <img src="{$row['img_src_min']}" data-full_image_url="{$row['img_src_max']}" data-id="{$row['id']}" alt="Картинка">
        </a>
        <p>Просмотров: {$row['reviews']}</p>
php;
    }
} else {
    echo "<a href=\"index.php\">Назад</a><br><br>";
    $sqlSelect = "SELECT * FROM images WHERE id = $id;";
    $result = mysqli_query($link, $sqlSelect);
    $row = mysqli_fetch_assoc($result);
    $reviews++;
    echo <<<php
        <img src="{$row['img_src_max']}" data-full_image_url="{$row['img_src_max']}" data-id="{$row['id']}" data-reviews="{$row['reviews']}" alt="Картинка">
        <p>Просмотров: {$reviews}</p>
php;

    $sqlUpdate = "UPDATE images SET reviews = $reviews WHERE id = $id";
    $result = mysqli_query($link, $sqlUpdate) or die(mysqli_error($link));
}
?>


<!--<script src="js.js"></script>-->
</body>
</html>