<?php
    function search_reserver (DBH $dbh, string $reserve_datetime) {
        $stmt = $dbh->query__SELECT([
            DBH::SQL__SELECT => '*',
            DBH::SQL__WHERE => [
                ['reserve_datetime' => ':reserve_datetime']
            ]
        ]);
        $dbh->bindParam($stmt,[
            [':reserve_datetime', $reserve_datetime, PDO::PARAM_STR]
        ]);
        $stmt->execute();
        $reserver = 0;
        while ($stmt->fetch(PDO::FETCH_OBJ)) {
            $reserver++;
        }
        return $reserver;
    }