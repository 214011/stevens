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
        private $tableName = '';

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

        /**
         * プロパティに直に代入しても良いが、視覚的にわかりやすいようにセッターでプライベートプロパティに代入する。
         * @param string $tableName 持ってきたいデータベースのテーブル名
         * @return void
         */
        public function set_tableName (string $tableName) {
            $this->tableName = $tableName;
        }

        /**
         * セットしたテーブル名を取得する
         * @return string
         */
        public function get_tableName () {
            return $this->tableName;
        }

        public const SQL__INSERT_INTO = 'INSERT INTO';
        public const SQL__SELECT = 'SELECT';
        public const SQL__UPDATE = 'UPDATE';
        public const SQL__SET = 'SET';
        public const SQL__WHERE = 'WHERE';
        public const SQL__FROM = 'FROM';
        public const SQL__ORDER_BY = 'ORDER BY';
        public const SQL__LIMIT = 'LIMIT';
        public const SQL__BETWEEN = 'BETWEEN';
        public const SQL__IN = 'IN';
        public const SQL__AND = 'AND';
        public const SQL__OR = 'OR';
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
        // FROM句も同様でメソッド使用時はショートカットできる


        /**
         * データベースにデータを書き込むSQL文のステートメントが返るメソッド
         * @param array{'SET': array{… array{'field': 'value'}}} $array_sql SQL文SET句でのセットするフィールドと値(キー名:フィールド名 => 値やバインド値)
         * @return PDOStatement
         */
        public function query__INSERT_INTO($array_sql) {
            $SET = '';
            $i = 0;
            while ($i < count($array_sql[self::SQL__SET])) {
                foreach ($array_sql[self::SQL__SET][$i] as $field => $val) {
                    $SET .= '`' . $this->tableName . '`.`' . $field .'` = ' . $val . ',';
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
         * データベースのデータを取得するSQL文のステートメントが返るメソッド
         * @param array{'SET': array{… array{'field': 'value'}}} $array_sql SQL文SET句でのセットするフィールドと値(キー名:フィールド名 => 値やバインド値)
         * @return PDOStatement
         */
        public function query__SELECT($array_sql) {
            $SELECT_field = $array_sql[self::SQL__SELECT];
            $WHERE = NULL;
            $ORDER_BY = NULL;
            $LIMIT = NULL;
            if (isset($array_sql[self::SQL__WHERE])) {
                $WHERE = self::SQL__WHERE;
                foreach ($array_sql[self::SQL__WHERE] as $sqlText => $array) {
                    if (is_numeric($sqlText)) {
                        foreach ($array as $field => $val) {
                            if (strpos($val, self::SQL__BETWEEN) !== false) {
                                $WHERE .= '`' . $this->tableName . '`.`' . $field .'` ' . $val;
                            } else {
                                $WHERE .= '`' . $this->tableName . '`.`' . $field .'` = ' . $val;
                            }
                        }
                    } else {
                        if ($sqlText === self::SQL__AND) {
                            $i = 0;
                            while ($i < count($array)) {
                                foreach ($array[$i] as $AND_field => $AND_val) {
                                    $WHERE .= ' ' . self::SQL__AND . ' `' . $this->tableName . '`.`' . $AND_field .'` = ' . $AND_val;
                                }
                                $i++;
                            }
                        }
                        if ($sqlText === self::SQL__OR) {
                            $i = 0;
                            while ($i < count($array)) {
                                foreach ($array[$i] as $OR_field => $OR_val) {
                                    $WHERE .= self::SQL__OR . '`' . $this->tableName . '`.`' . $OR_field .'` = ' . $OR_val;
                                }
                                $i++;
                            }
                        }
                    }
                }
            }
            if (isset($array_sql[self::SQL__ORDER_BY])) {
                $ORDER_BY = self::SQL__ORDER_BY;
                foreach ($array_sql[self::SQL__ORDER_BY] as $field =>  $order) {
                    $ORDER_BY .= '`' . $this->tableName . '`.`' . $field .'` = ' . $order;
                }
            }
            if (isset($array_sql[self::SQL__LIMIT])) {
                $LIMIT = self::SQL__LIMIT . ' ';
                $LIMIT .= $array_sql[self::SQL__LIMIT];
            }
            return $this->pdo->prepare('
                ' . self::SQL__SELECT . '
                    ' . $SELECT_field . '
                ' . self::SQL__FROM . '
                `' . $this->tableName . '`
                ' . $WHERE . '
                ' . $ORDER_BY . '
                ' . $LIMIT . '
            ');
        }

        /**
         * データベースのデータを更新・編集するSQL文のステートメントが返るメソッド
         * @param array{'SET': array{… array{'field': 'value'}}, 'WHERE': array{'field': 'value'}} $array_sql SQL文SET句とWHERE句でセットするフィールドと値(キー名:フィールド名 => 値やバインド値)
         * @return PDOStatement
         */
        public function query__UPDATE($array_sql) {
            $SET = '';
            $WHERE = '';
            $i = 0;
            while ($i < count($array_sql[self::SQL__SET])) {
                foreach ($array_sql[self::SQL__SET][$i] as $field => $val) {
                    $SET .= '`' . $this->tableName . '`.`' . $field .'` = ' . $val . ',';
                }
                $i++;
            }
            // 最後にコンマが入るとエラーが起こるので消す処理を加える。
            $SET = substr($SET, 0, -1);
            foreach ($array_sql[self::SQL__WHERE] as $field => $val) {
                $WHERE = '`' . $this->tableName . '`.`' . $field .'` = ' . $val;
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

    }
?>