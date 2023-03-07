<?php
try {
    require_once "./connect.php";
    $sql = "UPDATE `memInfo` SET `name`=:mem_name, `gender`=:mem_gender ,`birthday`=:mem_birthday, `phone`=:mem_phone, `email`=:mem_email, `address`=:mem_address  WHERE id=:mem_no";
    $memberEd = $pdo->prepare($sql);
    $data = json_decode(file_get_contents("php://input"), true);

    $memberEd->bindValue(':mem_no', $data['memNo']);
    $memberEd->bindValue(':mem_name', $data['memName']);
    $memberEd->bindValue(':mem_gender', $data['memGender']);
    $memberEd->bindValue(':mem_birthday', $data['memBirthday']);
    $memberEd->bindValue(':mem_phone', $data['memPhone']);
    $memberEd->bindValue(':mem_email', $data['memEmail']);
    $memberEd->bindValue(':mem_address', $data['memAddress']);
    $memberEd->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
    exit("系統暫時不能提供服務");}
?>