<?php
    session_start();
    if (empty($_SESSION['user'])) {
        header("Location: ./account.php");
    } else {
        require_once('module/user.php');
        require_once('module/dbh_instance.php');

        $user = unserialize($_SESSION['user']);
        unset($_SESSION['user']);

        $stmt = $dbh->query__INSERT_INTO([
            DBH::SQL__SET => [
                ['username' => ':username'],
                ['tel' => ':tel'],
                ['mail' => ':mail'],
                ['pswd' => ':pswd'],
                ['created' => 'NOW()']
            ]
        ]);
        $dbh->bindValue($stmt,[
            [':username', $user->get_userName()['full'], PDO::PARAM_STR],
            [':tel', $user->get_tel()['full'], PDO::PARAM_STR],
            [':mail', $user->get_mailAddress(), PDO::PARAM_STR],
            [':pswd', password_hash($user->get_password(), PASSWORD_DEFAULT), PDO::PARAM_STR]
        ]);
        $stmt->execute();

        $stmt = $dbh->query__SELECT([
            DBH::SQL__SELECT => '*',
            DBH::SQL__ORDER_BY => ['id' => DBH::SQL__ORDER_BY_DESC],
            DBH::SQL__LIMIT => 1
        ]);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $user->set_id($row->id);
            $user->set_reserveDatetime($row->reserve_datetime);
            $user->set_created($row->created);
            $user->set_modified($row->modified);
        }

        setcookie(
            'user',
            serialize($user),
            time() + (10 * 365 * 24 * 60 * 60)
        );

        header("Location: ./account_success.php");
    }
?>