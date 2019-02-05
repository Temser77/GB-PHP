<?php
$id = (int)$_GET['id'];
if (! empty($id)) {
    $sql = "SELECT * FROM goods WHERE idgoods = $id";
    $res = mysqli_query(connect(), $sql);
    if (empty($res)) {
        header('Location: ?page=7');
    } else {
        $row = mysqli_fetch_assoc($res);
        $content .= <<<php
<div class=goodscardcontainer>
<img src="{$row['imgsrc']}" alt="{$row['goodsname']}" width="600">
<h2>{$row['goodsname']}</h2>
<h4>ID: {$row['idgoods']}</h4>
<h4>Цвет: {$row['color']}</h4>
<h4>Размер: {$row['size']}</h4>
<h4>Рейтинг товара: {$row['rating']} / 5</h4>
<h3>Цена: {$row['price']} USD</h3>
<a class="goodscard-link" href="?page=8&id={$row['idgoods']}&add=1">Добавить товар в корзину</a>
</div>
php;
    }
} else {
    header('Location: ?page=7');
}