<?php
    require_once('dbh.php');
    $dbh = new DBH('localhost', 'test', 'root', 'root');
    $dbh->tableName = 'test_table';
    $stmt = $dbh->query_insert([
        ['username' => ':username'],
        ['password' => ':password'],
        ['created' => 'NOW()'],
    ]);
    $dbh->bindValue($stmt,[
        [':username', '姫情　太郎', PDO::PARAM_STR],
        [':password', 'Himejo', PDO::PARAM_STR]
    ]);
    $stmt->execute();
?>