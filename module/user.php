<?php
    /**
     * ユーザー情報をまとめたクラス
     */
    class User {

        // コンストラクターで代入される値
        private $userName = [];
        private $tel = [];
        private $mailAddress = '';
        private $password = '';
        // データベースから取得する値など
        private $id = '';
        private $reserveDate = '';
        private $created = '';
        private $modified = '';

        /**
         * ユーザー情報をプロパティに格納
         * @param array{'firstName': string, 'lastName': string} $array_usr_name 氏名（姓と名）=>連想配列
         * @param array{'firstTel': string, 'middleTel': string, 'lastTel': string} $array_tel 電話番号 =>連想配列
         * @param string $mail_address メールアドレス
         * @param string $password パスワード（ハッシュ化する前）
         */
        public function __construct($array_usr_name, $array_tel, $mail_address, $password) {
            $this->userName = [
                'full' => $array_usr_name['lastName'] . '　' . $array_usr_name['firstName'],
                'provide' => [$array_usr_name['lastName'], $array_usr_name['firstName']]
            ];
            $this->tel = [
                'full' => $array_tel['firstTel'] . '-' . $array_tel['middleTel'] . '-' . $array_tel['lastTel'],
                'provide' => [$array_tel['firstTel'], $array_tel['middleTel'], $array_tel['lastTel']]
            ];
            $this->mailAddress = $mail_address;
            $this->password = $password;
        }

        public function get_userName() {
            return $this->userName;
        }

        public function get_tel() {
            return $this->tel;
        }

        public function get_mailAddress() {
            return $this->mailAddress;
        }

        public function get_password() {
            return $this->password;
        }

        public function set_id (string $id) {
            $this->id = $id;
        }

        public function set_reserveDate (string $reserveDate) {
            $this->reserveDate = $reserveDate;
        }

        public function set_created (string $created) {
            $this->created = $created;
        }

        public function set_modified (string $modified) {
            $this->modified = $modified;
        }

        public function get_id () {
            $this->id;
        }

        public function get_reserveDate () {
            $this->reserveDate;
        }

        public function get_created () {
            $this->created;
        }

        public function get_modified () {
            $this->modified;
        }

    }
?>