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
         * @param string $origin_password 認証したいパスワードの文字列
         * @param string $hashed_password ハッシュ化されたパスワードの文字列
         */
        public function __construct (string $mailAddress, string $origin_password, string $hashed_password) {
            $this->mailAddress = $mailAddress;
            $this->password = $origin_password;
            if ((password_verify($this->password, $hashed_password))) {
                $this->set_login_session();
                $this->pass_state = true;
            } else {
                $this->pass_state = false;
            }
        }

        /**
         * 見やすいようにクラス内メソッドで処理をカプセル化しておく。
         * session_start()の実行タイミングはユーザに委ねる。
         * @return void
         */
        private function set_login_session () {
            $_SESSION['login'] = ['mailAddress' => $this->mailAddress, 'password' => $this->password];
        }

        /**
         * パスワードが認証できたかどうかを条件値で返すインスタンスメソッド
         * @return bool
         */
        public function is_pass () {
            return $this->pass_state;
        }

        /**
         * ログインセッション変数を破棄する静的メソッド（ログアウト）
         * @return void
         */
        public static function logout () {
            unset($_SESSION['login']);
        }

        /**
         * ログインセッション変数が存在しているかどうかを条件値で返す静的メソッド（ログインの有無）
         * @return bool
         */
        public static function is_login () {
            if (isset($_SESSION['login'])) {
                return true;
            } else {
                return false;
            }
        }

    }
?>