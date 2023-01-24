<?php
    $Ajax_POST = json_decode(file_get_contents('php://input'), true);
    require_once('../../module/utility_functions.php');
    get_module_search_reserver();
    $dbh = get_module_dbh_instance();
    $i = 0;
    $postLen = count($Ajax_POST);
    $resData = [];
    while ($i < $postLen) {
        $datetime = new DateTime($Ajax_POST[$i]);
        array_push($resData, 4 - search_reserver($dbh, $datetime->format('Y-m-d H:i:s')));
        $i++;
    }
    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($resData);
?>
