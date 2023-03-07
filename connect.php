<?php
try {
    $dbname = "members";
    $user = "root";
    $password = "root";

    $dsn = "mysql:host=localhost:3306;dbname=$dbname;charset=utf8";
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $option);
} catch (PDOException $e) {
    echo '錯誤行號:', $e->getLine(), '<br>';
    echo '錯誤訊息:', $e->getMessage(), '<br>';
}
?>