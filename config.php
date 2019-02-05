<?php
session_start();

function connect()
{
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root',
            'root', 'gbphp', '3306', 'MySQL');
    }
    return $link;
}

function clearStr($str)
{
    return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
}

function doFeedbackAction()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $feedback = clearStr($_POST['feedback']);
        $rating = clearStr($_POST['rating']);
        $sql = "UPDATE feedback SET 
                feedback ='$feedback' ,
                rating ='$rating'
             WHERE idFeedback = {$_GET['editfeed']}";
        mysqli_query(connect(), $sql) or die(mysqli_error(connect()));
        header('Location: ?page=6');
        return false;
    }
    if (empty($_GET['delfeed'] or $_GET['editfeed'] or $_GET['createfeed'])) {
        return false;
    }
    if (!empty($_GET['delfeed'])) {
        $sql = "DELETE FROM feedback WHERE idFeedback = {$_GET['delfeed']}";
        mysqli_query(connect(), $sql);
        header('Location: ?page=6');
    }
    if (!empty($_GET['editfeed'])) {
        $sql = "SELECT * FROM users LEFT JOIN feedback ON users.id = feedback.iduser LEFT JOIN goods ON feedback.idgoods = goods.idgoods WHERE idFeedback = {$_GET['editfeed']}";
        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        $content = <<<php
        <form method="post">
        <h3>Редактирование отзыва №{$row['idFeedback']} </h3>
        <label for="goodsname">Наименование</label><input type="text" name="goodsname" value="{$row['goodsname']}" readonly>
        <label for="feedback">Отзыв</label><input type="text" name="feedback" placeholder="feedback" value="{$row['feedback']}">
        <label for="rating">Рейтинг</label><input type="number" min="1" max="5" name="rating" placeholder="rating" value="{$row['rating']}">
        <input type="submit">
</form>
php;
        return $content;

    }
    return false;
}

function createCart()
{
    $id = (int)$_GET['id'];
    $add = (bool)$_GET['add'];
    $del = (bool)$_GET['del'];
    if ($add) {
        $sql = "SELECT * FROM goods WHERE idgoods = $id";
        $res = mysqli_query(connect(), $sql);
        if (!empty($res)) {
            $itemIndex = -1;
            $row = mysqli_fetch_assoc($res);
            foreach ($_SESSION['cart'] as $key => $val) {
                if ($val['id'] == $row['idgoods']) {
                    $itemIndex = $key;
                }
            }
            if ($itemIndex == -1) {
                $cartitem['id'] = $id;
                $cartitem['goodsname'] = $row['goodsname'];
                $cartitem['imgsrc'] = $row['imgsrc'];
                $cartitem['price'] = $row['price'];
                $cartitem['color'] = $row['color'];
                $cartitem['size'] = $row['size'];
                $cartitem['rating'] = (int)$row['rating'];
                $cartitem['quantity'] += 1;
                $_SESSION['cart'][] = $cartitem;
            } else {
                $_SESSION['cart'][$itemIndex]['quantity'] += 1;
            }
        }
    }
    if ($del) {
        foreach ($_SESSION['cart'] as $key => $val) {
            if ($val['id'] == $id) {
                array_splice($_SESSION['cart'],$key,1);
            }
        }
    }

    $cartContent = '';
    $cartTotal = 0;
    foreach ($_SESSION['cart'] as $key => $val) {
        $itemTotal = $val['quantity'] * $val['price'];
        $cartTotal += $itemTotal;
        $cartContent .= <<<php
        <div class="cart-item">
            <p>ID: {$val['id']}<br>
            {$val['goodsname']}<br>
                Цвет: {$val['color']}<br>
                Размер: {$val['size']}<br>
                Количество: {$val['quantity']}<br>
                Цена: {$val['price']} руб.<br>
                Итого: $itemTotal руб.
                <a class="goodscard-link" href="?id={$val['id']}&del=1">Удалить товар</a>
            </p>
        </div>
php;
    }
    return $cartContent;
}



function calcCartTotal()
{
    $cartTotal = 0;

    foreach ($_SESSION['cart'] as $key => $val) {
        $cartTotal += $val['quantity'] * $val['price'];
    }
    return $cartTotal;
}

function auth() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST['login']);
            $login = clearStr($_POST['login']);
            $sql = "SELECT * FROM users WHERE login = '$login'";
            $res = mysqli_query(connect(), $sql);
            $row = mysqli_fetch_assoc($res);
            $password = md5($_POST['password']);
            $passwordSql = $row['passmd5'];
            if ($password == $passwordSql){
                $_SESSION['authorized'] = 'YES';
                $_SESSION['login'] = $login;
                $_SESSION['name'] = $row['name'];
            }
        }
    }