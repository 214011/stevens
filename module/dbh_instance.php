<?php
    require_once(__DIR__ . '/../lib/dbh.php');
    function get_dbh () {
        $dbh = new DBH('localhost', 'stevens', 'root', 'root');
        $dbh->set_tableName('user_info');
        return $dbh;
    }