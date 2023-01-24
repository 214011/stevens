<?php
    require_once(__DIR__ . '/../lib/dbh.php');
    function get_dbh () {
        $dbh = new DBH('localhost', 'stevens', 'root', 'root');
        $dbh->set_tableName('user_info');
        return $dbh;
    }


    // $stmt = $dbh->query__UPDATE([
    //     DBH::SQL__SET => [
    //         ['username' => ':username'],
    //         ['password' => ':password'],
    //     ],
    //     DBH::SQL__WHERE => ['id' => ':id']
    // ]);
    // $dbh->bindValue($stmt,[
    //     [':username', '野村　純平', PDO::PARAM_STR],
    //     [':password', 'jnpnmr1227', PDO::PARAM_STR],
    //     [':id', 3, PDO::PARAM_INT]
    // ]);
    // $stmt->execute();