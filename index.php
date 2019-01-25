<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <style>
        .galleryWrapper__screen{
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
        .galleryWrapper__switchPicLeft
        {
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
    </style>
</head>
<body>

<div class="galleryPreviewsContainer">

    <?php
    $imgArray = array_slice(scandir(__DIR__ . "/images/min"), 2);
    foreach ($imgArray as $imgsrc) {
        echo "<img src=\"images/min/$imgsrc\" data-full_image_url=\"images/max/$imgsrc\" alt=\"Картинка\">";
    }

$logPath = "log.txt";
    file_put_contents( $logPath, date("c") . PHP_EOL, FILE_APPEND );
    $myLog = file_get_contents($logPath);
    $logArray = explode("\r\n", $myLog);
    if (count($logArray) > 10) {
        $countCopies = file_get_contents("countCopies.txt");
        $countCopies++;
        copy($logPath, "log$countCopies.txt");
        file_put_contents('countCopies.txt',$countCopies);
        file_put_contents( $logPath, "");
    }
    ?>


<!--    <img src="images/min/1.jpg" data-full_image_url="images/max/1.jpg" alt="Картинка1">
    <img src="images/min/2.jpg" data-full_image_url="images/max/2.jpg" alt="Картинка2">
    <img src="images/min/3.jpg" data-full_image_url="images/max/3.jpg" alt="Картинка3">
    <img src="images/min/4.jpg" data-full_image_url="images/max/5.jpg" alt="Картинка4">-->
</div>

<!-- <div class="galleryWrapper">
  <div class="galleryWrapper__screen"></div>
  <img class="galleryWrapper__close" src="images/gallery/close.png" alt="">
  <img class="galleryWrapper__image" src="images/max/1.jpg" alt="">
  <a href="" class="galleryWrapper__switchPicRight">&gt;</a>
  <a href="" class="galleryWrapper__switchPicLeft">&lt;</a>
</div>
-->
<script src="js.js"></script>
</body>
</html>