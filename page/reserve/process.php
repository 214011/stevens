<?php
    require_once('../../module/utility_functions.php');
    get_class_login();
    if (Login::is_login()) {
        if (empty($_GET['datetime'])) {
            header('Location: ./');
        } else {
            try {
                $date = new DateTime($_GET['datetime']);
            } catch (Exception $e) {
                header('Location: ./');
            }

            echo $date->format('Y-m-d H:i:s');
        }
    } else {
        header('Location: ./');
    }
?>