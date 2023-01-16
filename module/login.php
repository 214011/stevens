<?php
    require_once('user.php');
    /**
     * ログイン管理をするクラス。
     */
    class Login {

        private string $mailAddress;
        private string $password;
        private User $user;

        /**
         * コンストラクターで'login'のキー名で＄_SESSION変数にセットする。キーの値は、['mailAddress' => $val, 'password' => $val]
         * @param string $mailAddress メールアドレスの文字列
         * @param string $password パスワード文字列
         */
        public function __construct (string $mailAddress, string $password) {
            $this->mailAddress = $mailAddress;
            $this->password = $password;
            var_dump(self::is_user_cookie());
            if (self::is_user_cookie()) {
                $this->user = unserialize($_COOKIE['user']);
                if ((password_verify($this->password, $this->user->get_password()))) {
                    $this->set_session();
                } else {
                    // no process
                }
            } else {
                unset($_SESSION['login']);
            }
        }

        private function set_session () {
            $_SESSION['login'] = ['mailAddress' => $this->mailAddress, 'password' => $this->password];
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