<?php
    require_once('dbh.php');
    $dbh = new DBH('localhost', 'test', 'root', 'root');
    $dbh->tableName = 'test_table';

    $stmt = $dbh->query__INSERT_INTO([
        ['username' => ':username'],
        ['password' => ':password'],
        ['created' => 'NOW()']
    ]);
    $dbh->bindValue($stmt,[
        [':username', '姫情　太郎', PDO::PARAM_STR],
        [':password', 'Himejo', PDO::PARAM_STR]
    ]);
    $stmt->execute();

    $stmt = $dbh->query__UPDATE([
        ['username' => ':username'],
        ['password' => ':password'],
    ],
    ['id' => ':id']
    );
    $dbh->bindValue($stmt,[
        [':username', '野村　純平', PDO::PARAM_STR],
        [':password', 'jnpnmr1227', PDO::PARAM_STR],
        [':id', 1, PDO::PARAM_INT]
    ]);
    $stmt->execute();
?>