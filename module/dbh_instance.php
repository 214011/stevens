<?php
    require_once('dbh.php');
    $dbh = new DBH('localhost', 'test', 'root', 'root');
    $dbh->set_tableName('test_table');

    $stmt = $dbh->query__INSERT_INTO([
        DBH::SQL__SET => [
            ['username' => ':username'],
            ['password' => ':password'],
            ['created' => 'NOW()']
        ]
    ]);
    $dbh->bindValue($stmt,[
        [':username', '姫情　太郎', PDO::PARAM_STR],
        [':password', 'Himejo', PDO::PARAM_STR]
    ]);
    $stmt->execute();

    $stmt = $dbh->query__UPDATE([
        DBH::SQL__SET => [
            ['username' => ':username'],
            ['password' => ':password'],
        ],
        DBH::SQL__WHERE => ['id' => ':id']
    ]);
    $dbh->bindValue($stmt,[
        [':username', '野村　純平', PDO::PARAM_STR],
        [':password', 'jnpnmr1227', PDO::PARAM_STR],
        [':id', 3, PDO::PARAM_INT]
    ]);
    $stmt->execute();

    $stmt = $dbh->query__SELECT([
        DBH::SQL__SELECT => '*',
        DBH::SQL__WHERE => [
            ['id' => ':id']
        ]
    ]);
    $dbh->bindValue($stmt,[
        [':id', 3, PDO::PARAM_INT]
    ]);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo $row->username;
        echo $row->password;
        echo $row->created;
    }
?>