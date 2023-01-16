<?php
    /**
     * ログイン管理をするクラス。
     */
    class Login {

        private string $mailAddress;
        private string $password;
        private bool $pass_state;

        /**
         * コンストラクターで'login'のキー名で＄_SESSION変数にセットする。キーの値は、['mailAddress' => $val, 'password' => $val]
         * @param string $mailAddress メールアドレスの文字列
         * @param string $password パスワード文字列
         */
        public function __construct (string $mailAddress, string $origin_password, string $hashed_password) {
            $this->mailAddress = $mailAddress;
            $this->password = $origin_password;
            if ((password_verify($this->password, $hashed_password))) {
                $this->set_session();
                $this->pass_state = true;
            } else {
                $this->pass_state = false;
            }
        }

        private function set_session () {
            $_SESSION['login'] = ['mailAddress' => $this->mailAddress, 'password' => $this->password];
        }

        public function is_pass () {
            return $this->pass_state;
        }

        public static function is_user_cookie () {
            return isset($_COOKIE['user']);
        }

        public static function logout () {
            unset($_SESSION['login']);
        }

        public static function is_login () {
            if (isset($_SESSION['login'])) {
                return true;
            } else {
                return false;
            }
        }

    }
?>