<?php
try {
    require_once "./connect.php";
    $sql = "SELECT * FROM `memInfo` ";
    $member = $pdo->query($sql);
    $memInfos = $member->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($memInfos);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit("系統暫時不能提供服務");}
?>