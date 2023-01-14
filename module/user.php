<?php
    /**
     * ユーザー情報をまとめたクラス
     */
    class User {

        private $usr_name = '';
        private $tel = '';
        private $mail_address = '';
        private $password = '';

        /**
         * ユーザー情報を登録
         * @param array{'firstName': string, 'lastName': string} $array_usr_name 氏名（姓と名）=>連想配列
         * @param array{'firstTel': string, 'middleTel': string, 'lastTel': string} $array_tel 電話番号 =>連想配列
         * @param string $mail_address メールアドレス
         * @param string $password パスワード（ハッシュ化する前）
         */
        public function __construct($array_usr_name, $array_tel, $mail_address, $password) {
            $this->usr_name = $array_usr_name['firstName'] . '　' . $array_usr_name['lastName'];
            $this->tel = $array_tel['firstTel'] . '-' . $array_tel['middleTel'] . '-' . $array_tel['lastTel'];
            $this->mail_address = $mail_address;
            $this->password = $password;
        }



    }
?>