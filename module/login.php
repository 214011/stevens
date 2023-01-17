<?php
    /**
     * ログイン管理をするクラス。
     */
    class Login {

        private string $mailAddress;
        private string $password;
        private bool $pass_state;

        /**
         * コンストラクターでプライベートプロパティに値を代入する処理と認証処理を行う。
         * @param string $user_mailAddress 認証元のメールアドレスの文字列
         * @param string $input_mailAddress 認証したいメールアドレスの文字列を入力
         * @param string $origin_password 認証したいパスワードの文字列
         * @param string $hashed_password ハッシュ化されたパスワードの文字列
         */
        public function __construct (string $user_mailAddress, string $input_mailAddress, string $origin_password, string $hashed_password) {
            $this->mailAddress = $user_mailAddress;
            $this->password = $origin_password;
            if (password_verify($this->password, $hashed_password) && $input_mailAddress === $this->mailAddress) {
                $this->pass_state = true;
            } else {
                $this->pass_state = false;
            }
        }

        private int $mode = 1;
        /**
         * @var int 配列モード
         */
        public const SET_INSERT_ARRAY_MODE = 0;
        /**
         * @var int 連想配列モード['mailAddress' => $value, 'password' => $value]
         */
        public const SET_INSERT_DICTIONARY_MODE = 1;

        /**
         * ログインセッション変数にインサートするデータ構造を指定
         * @param int $insert_mode デフォルトで連想配列の構造になる。Login::SET_INSERT_ARRAY_MODEとすれば配列モードになる
         */
        public function setInsertMode (int $insert_mode = Login::SET_INSERT_DICTIONARY_MODE) {
            $this->mode = $insert_mode;
        }

        /**
         * !important これが無ければログイン中の判断ができないため、必ず呼び出す。
         * 'login'のキー名で＄_SESSION変数にセットする。キーの値の構造は、setInsertModeで指定する。
         * session_start()の実行タイミングはユーザに委ねる。
         * @return void
         */
        public function insert_login_session () {
            if ($this->mode) {
                $_SESSION['login'] = ['mailAddress' => $this->mailAddress, 'password' => $this->password];
            } else {
                $_SESSION['login'] = [$this->mailAddress, $this->password];
            }
        }

        /**
         * ユーザが認証できたかどうかを条件値で返すインスタンスメソッド
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
         * session_start()の実行タイミングはユーザに委ねる。
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