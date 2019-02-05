<?php
$title = 'Каталог товаров';
$sql = "SELECT * FROM goods";
$res = mysqli_query(connect(), $sql);
$content .= "<div class='goodscontainer'>";
while ($row = mysqli_fetch_assoc($res)) {
    $content .= <<<php
<div class="goodscard">
<a href="?page=8&id={$row['idgoods']}"><img src="{$row['imgsrc']}" alt="{$row['goodsname']}"></a>
<h2>{$row['goodsname']}</h2>
<h4>ID: {$row['idgoods']}</h4>
<h4>Цвет: {$row['color']}</h4>
<h4>Размер: {$row['size']}</h4>
<h4>Рейтинг товара: {$row['rating']} / 5</h4>
<h3>Цена: {$row['price']} USD</h3>
<a class="goodscard-link" href="?page=8&id={$row['idgoods']}">Перейти к товару</a>
<a class="goodscard-link" href="?page=7&id={$row['idgoods']}&add=1">Добавить товар в корзину</a>
</div>
php;

}
$content .= "</div>";
