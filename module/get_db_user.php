<?php
    require_once(__DIR__ . '/dbh_instance.php');

    /**
     * Undocumented function
     *
     * @param DBH $dbh DBHクラスのインスタンスオブジェクト
     * @param string $mailAddress 取得したいアカウントのメールアドレス
     * @return mixed
     */
    function get_db_user (DBH $dbh, string $mailAddress) {
        $stmt = $dbh->query__SELECT([
            DBH::SQL__SELECT => '*',
            DBH::SQL__WHERE => [
                ['mail' => ':mail']
            ],
            DBH::SQL__LIMIT => 1
        ]);
        $dbh->bindValue($stmt,[
            [':mail', $mailAddress, PDO::PARAM_STR]
        ]);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
