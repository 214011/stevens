<?php
    /**
     * DataBaseHandle(DBに接続したのち、そのDBを操作するための情報を代入しておきます。操作できる状態、つまり車でいうハンドルを入れておきます。)
     */
    class DBH {

        /**
         * @var PDO PHP Data Objects(データベースに接続および読み書きするクラスのインスタンス)
         */
        public $pdo;

        /**
         * @var string 持ってきたいデータベースのテーブル名
         */
        public $tablename = '';

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
         * @param array{… array{'field': string, 'value': string}} $sql_SET SQL文SET句でのセットするフィールドと値
         * @return PDOStatement
         */
        public function query_insert($sql_SET) {
            $SET = '';
            $i = 0;
            foreach ($sql_SET as $key => $val) {
                $SET .= '`' . $this->tablename . '`.`' . $key .'` = ' . $val . ',';
                $i++;
            }
            return $this->pdo->prepare('
                ' . self::SQL_INSERT_INTO . '
                    `' . $this->tablename . '`
                ' . self::SQL_SET . '
                ' . $SET . '
            ');
        }
    }
?>