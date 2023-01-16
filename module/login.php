<?php
    require_once('user.php');
    /**
     * ログイン管理をするクラス。
     */
    class Login {

        private string $mailAddress;
        private string $password;
        private User $user;
        private bool $login_state;

        /**
         * コンストラクターで'login'のキー名で＄_SESSION変数にセットする。キーの値は、['mailAddress' => $val, 'password' => $val]
         * @param string $mailAddress メールアドレスの文字列
         * @param string $password パスワード文字列
         */
        public function __construct (string $mailAddress, string $password) {
            $this->mailAddress = $mailAddress;
            $this->password = $password;
            if (self::is_user_cookie()) {
                $this->user = unserialize($_COOKIE['user']);
                if ((password_verify($this->password, $this->user->get_password()))) {
                    $this->login_state = true;
                    $this->set_session();
                } else {
                    $this->login_state = false;
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

        public function logout () {
            unset($_SESSION['login']);
        }

        public function is_login () {
            return $this->login_state;
        }

    }
?>