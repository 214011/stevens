<?php
    /**
     * DataBaseHandle(DBに接続したのち、そのDBを操作するための情報を代入しておきます。操作できる状態、つまり車でいうハンドルを入れておきます。)
     */
    class DBH {

        /**
         * @var PDO PHP Data Objects(データベースに接続および読み書きするクラスのインスタンス)
         */
        private $pdo;

        /**
         * @var string 持ってきたいデータベースのテーブル名
         */
        public $tableName = '';

        /**
         * @param string $host mysqlサーバーのホスト名
         * @param string $dbname 使用するデータベース名
         * @param string $user_name mysqlサーバーのユーザー名
         * @param string $password mysqlサーバーのパスワード
         */
        public function __construct($host, $dbname, $user_name, $password) {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
            try {
                $this->pdo = new PDO($dsn, $user_name, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                header('Content-Type: text/html; charset=UTF-8', true, 500);
                exit($e->getMessage());
            }
        }

        public const SQL_INSERT_INTO = 'INSERT INTO';
        public const SQL_SET = 'SET';
        public const SQL_SELECT = 'SELECT';
        public const SQL_WHERE = 'WHERE';
        public const SQL_ORDER_BY = 'ORDER BY';
        public const SQL_ORDER_BY_DESC = 'DESC';
        public const SQL_ORDER_BY_ASC = 'ASC';

        /**
         * データベースにデータを書き込むSQL文のステートメントが返るメソッド
         * @param array{… array{'field': 'value'}} $sql_SET SQL文SET句でのセットするフィールドと値(キー名:フィールド名 => 値やバインド値)
         * @return PDOStatement
         */
        public function query_insert($sql_SET) {
            $SET = '';
            $i = 0;
            while ($i < count($sql_SET)) {
                foreach ($sql_SET[$i] as $key => $val) {
                    $SET .= '`' . $this->tableName . '`.`' . $key .'` = ' . $val . ',';
                }
                $i++;
            }
            // 最後にコンマが入るとエラーが起こるので消す処理を加える。
            $SET = substr($SET, 0, -1);
            return $this->pdo->prepare('
                ' . self::SQL_INSERT_INTO . '
                    `' . $this->tableName . '`
                ' . self::SQL_SET . '
                ' . $SET . '
            ');
        }

        /**
         * @param PDOStatement $stmt PDOStatementのオブジェクト
         * @param array{… array{0: int|string, 1: mixed, 2: int | PDO::PARAM_STR?}} $array_bindValue 配列化したbindValueメソッドに入れる値（インデックスを引数に対応させる）
         * @return void
         */
        public function bindValue (PDOStatement $stmt, $array_bindValue) {
            $i = 0;
            while ($i < count($array_bindValue)) {
                $array_bindValue[$i];
                $stmt->bindValue($array_bindValue[$i][0], $array_bindValue[$i][1], $array_bindValue[$i][2]);
                $i++;
            }
        }

        /**
         * fetchモードはオブジェクトで返す
         * @param PDOStatement $stmt PDOStatementのオブジェクト
         * @return mixed
         */
        public function fetch (PDOStatement $stmt) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

    }
?>