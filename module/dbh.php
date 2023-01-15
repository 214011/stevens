<?php
    /**
     * DataBaseHandle(DBに接続したのち、そのDBを操作するための情報をインスタンス化。操作できる状態、つまり車でいうハンドルを入れておく。)
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

        public const SQL__INSERT_INTO = 'INSERT INTO';
        public const SQL__SELECT = 'SELECT';
        public const SQL__UPDATE = 'UPDATE';
        public const SQL__SET = 'SET';
        public const SQL__WHERE = 'WHERE';
        public const SQL__ORDER_BY = 'ORDER BY';
        /**
         * @var string 昇順にする句
         */
        public const SQL__ORDER_BY_ASC = 'ASC';
        /**
         * @var string 降順にする句
         */
        public const SQL__ORDER_BY_DESC = 'DESC';

        // このクラスでのSQL文を入力するメソッドは、使用時にテーブル名書かなくても良い仕様にする。
        // 途中で読み書きしたいテーブルがあればメソッド使用前にpublic $tableNameにテーブル名を代入し変更する。

        /**
         * データベースにデータを書き込むSQL文のステートメントが返るメソッド
         * @param array{'SET': array{… array{'field': 'value'}}} $sql_SET SQL文SET句でのセットするフィールドと値(キー名:フィールド名 => 値やバインド値)
         * @return PDOStatement
         */
        public function query__INSERT_INTO($sql_SET) {
            $SET = '';
            $i = 0;
            while ($i < count($sql_SET[self::SQL__SET])) {
                foreach ($sql_SET[self::SQL__SET][$i] as $key => $val) {
                    $SET .= '`' . $this->tableName . '`.`' . $key .'` = ' . $val . ',';
                }
                $i++;
            }
            // 最後にコンマが入るとエラーが起こるので消す処理を加える。
            $SET = substr($SET, 0, -1);
            return $this->pdo->prepare('
                ' . self::SQL__INSERT_INTO . '
                    `' . $this->tableName . '`
                ' . self::SQL__SET . '
                ' . $SET . '
            ');
        }

        /**
         * データベースのデータを更新・編集するSQL文のステートメントが返るメソッド
         * @param array{'SET': array{… array{'field': 'value'}}, 'WHERE': array{'field': 'value'}} $sql_SET_WHERE SQL文SET句とWHERE句でセットするフィールドと値(キー名:フィールド名 => 値やバインド値)
         * @return PDOStatement
         */
        public function query__UPDATE($sql_SET_WHERE) {
            $SET = '';
            $WHERE = '';
            $i = 0;
            while ($i < count($sql_SET_WHERE[self::SQL__SET])) {
                foreach ($sql_SET_WHERE[self::SQL__SET][$i] as $key => $val) {
                    $SET .= '`' . $this->tableName . '`.`' . $key .'` = ' . $val . ',';
                }
                $i++;
            }
            // 最後にコンマが入るとエラーが起こるので消す処理を加える。
            $SET = substr($SET, 0, -1);
            foreach ($sql_SET_WHERE[self::SQL__WHERE] as $key => $val) {
                $WHERE = '`' . $this->tableName . '`.`' . $key .'` = ' . $val;
            }
            return $this->pdo->prepare('
                ' . self::SQL__UPDATE . '
                    `' . $this->tableName . '`
                ' . self::SQL__SET . '
                ' . $SET . '
                ' . self::SQL__WHERE . '
                ' . $WHERE . '
            ');
        }

        /**
         * @param PDOStatement $stmt PDOStatementのオブジェクト
         * @param array{… array{0: int|string, 1: mixed, 2: int | PDO::PARAM_STR?}} $array_bindValue 配列化したbindValueメソッドに入れる値（インデックスを引数に対応させる）
         * @return void
         */
        public function bindValue(PDOStatement $stmt, $array_bindValue) {
            $i = 0;
            while ($i < count($array_bindValue)) {
                $array_bindValue[$i];
                $stmt->bindValue($array_bindValue[$i][0], $array_bindValue[$i][1], $array_bindValue[$i][2]);
                $i++;
            }
        }

        /**
         * @param PDOStatement $stmt PDOStatementのオブジェクト
         * @param array{… array{0: int|string, 1: mixed, 2: int | PDO::PARAM_STR?}} $array_bindValue 配列化したbindValueメソッドに入れる値（インデックスを引数に対応させる）
         * @return void
         */
        public function bindParam(PDOStatement $stmt, $array_bindParam) {
            $i = 0;
            while ($i < count($array_bindParam)) {
                $array_bindParam[$i];
                $stmt->bindParam($array_bindParam[$i][0], $array_bindParam[$i][1], $array_bindParam[$i][2]);
                $i++;
            }
        }

        /**
         * fetchモードはオブジェクトで返す
         * @param PDOStatement $stmt PDOStatementのオブジェクト
         * @return mixed
         */
        public function fetch(PDOStatement $stmt) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

    }
?>