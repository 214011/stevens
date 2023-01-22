<?php
    /**
     * ユーザー情報をまとめたクラス
     */
    class User {

        // コンストラクターで代入される値
        private array $userName;
        private array $tel;
        private string $mailAddress;
        private string $password;
        // データベースから取得する値など
        private string $id;
        private string | null $reserveDatetime;
        private string $created;
        private string $modified;

        /**
         * ユーザー情報をプロパティに格納
         * @param array{'firstName': string, 'lastName': string} $array_usr_name 氏名（姓と名）=>連想配列
         * @param array{'firstTel': string, 'middleTel': string, 'lastTel': string} $array_tel 電話番号 =>連想配列
         * @param string $mail_address メールアドレス
         * @param string $password パスワード（ハッシュ化する前）
         */
        public function __construct (array $array_usr_name, array $array_tel, string $mail_address, string $password) {
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

        /**
         * ユーザ名が入った連想配列が返る
         * @return array
         */
        public function get_userName () {
            return $this->userName;
        }

        /**
         * 電話番号が入った連想配列が返る
         * @return array
         */
        public function get_tel () {
            return $this->tel;
        }

        /**
         * メールアドレスの文字列が返る
         * @return string
         */
        public function get_mailAddress () {
            return $this->mailAddress;
        }

        /**
         * パスワードの文字列をプロパティに代入するセッター
         * @param string $password セットしたいパスワードの文字列
         * @return void
         */
        public function set_password (string $password) {
            $this->password = $password;
        }

        /**
         * パスワードの文字列が返る
         * @return string
         */
        public function get_password () {
            return $this->password;
        }

        /**
         * パスワードの文字列を一部隠した文字列が返る静的メソッド
         * @param string $password 隠したいパスワードの文字列
         * @return string
         */
        public static function to_hidden_password (string $password) {
            $hiddenPswd = '';
            $i = 0;
            while ($i < count(str_split($password))) {
                if($i === 0 || $i === (count(str_split($password)) - 1)) {
                    $hiddenPswd .= $password[$i];
                } else {
                    $hiddenPswd .= '＊';
                }
                $i++;
            }
            return $hiddenPswd;
        }

        /**
         * IDの文字列をプロパティに代入するセッター
         * @param string $id セットしたいIDの文字列
         * @return void
         */
        public function set_id (string $id) {
            $this->id = $id;
        }

        /**
         * 予約日の文字列をプロパティに代入するセッター
         * @param string $reserveDatetime セットしたい予約日の文字列
         * @return void
         */
        public function set_reserveDatetime (string | null $reserveDatetime) {
            $this->reserveDatetime = $reserveDatetime;
        }

        /**
         * 作成日の文字列をプロパティに代入するセッター
         * @param string $created セットしたい作成日の文字列
         * @return void
         */
        public function set_created (string $created) {
            $this->created = $created;
        }

        /**
         * 更新日の文字列をプロパティに代入するセッター
         * @param string $modified セットしたい更新日の文字列
         * @return void
         */
        public function set_modified (string $modified) {
            $this->modified = $modified;
        }

        /**
         * IDの文字列が返る
         * @return string
         */
        public function get_id () {
            return $this->id;
        }

        /**
         * 予約日の文字列が返る
         * @return string
         */
        public function get_reserveDatetime () {
            return $this->reserveDatetime;
        }

        /**
         * 作成日の文字列が返る
         * @return string
         */
        public function get_created () {
            return $this->created;
        }

        /**
         * 更新日の文字列が返る
         * @return string
         */
        public function get_modified () {
            return $this->modified;
        }

    }