<?php
function connect() {
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root',
            'root', 'gbphp', '3306', 'MySQL');
    }
    return $link;
}

function clearStr($str) {
    return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
}

function doFeedbackAction() {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $feedback = clearStr($_POST['feedback']);
        $rating = clearStr($_POST['rating']);
        $sql = "UPDATE feedback SET 
                feedback ='$feedback' ,
                rating ='$rating'
             WHERE idFeedback = {$_GET['editfeed']}";
        mysqli_query(connect(), $sql) or die(mysqli_error(connect()));
        header('Location: ?page=6');
        return;
    }
    if (empty($_GET['delfeed'] or $_GET['editfeed'] or $_GET['createfeed'])) {
        return;
    }
    if (! empty($_GET['delfeed'])) {
        $sql = "DELETE FROM feedback WHERE idFeedback = {$_GET['delfeed']}";
        mysqli_query(connect(), $sql);
        header('Location: ?page=6');
    }
    if (! empty($_GET['editfeed'])) {
        $sql = "SELECT * FROM feedback WHERE idFeedback = {$_GET['editfeed']}";
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
}

