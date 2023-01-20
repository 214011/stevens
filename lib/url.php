<?php
    /**
     * 使いたいファイルのURLまでを自動整形するクラス
     */
    class URL {

        /**
         * @var string ファイルまでのurl
         */
        private string $url;

        /**
         * @var string サイトのディレクトリ名（フォルダー名）
         */
        public static string $DIR;

        private const PROTOCOL_HTTP = 'http://';
        private const PROTOCOL_HTTPS = 'https://';


        /**
         * 親フォルダー名をクラス内参照のthisに登録
         * @param string | array  $parentFolderName 親フォルダー名の文字列。ただし、同階層の場合「''」空白無しの文字列。入れ子のフォルダーが多いようであれば配列。
         */
        public function __construct (mixed $parentFolderName = '') {
            if(isset($_SERVER['HTTPS'])){
                $this->url = self::PROTOCOL_HTTPS;
            }else{
                $this->url = self::PROTOCOL_HTTP;
            }
            $this->url .= $_SERVER['HTTP_HOST'] . '/' . self::$DIR . '/';

            if (is_array($parentFolderName)) {
                $i = 0;
                while ($i < count($parentFolderName)) {
                    $this->url .= $parentFolderName[$i] . '/';
                    $i++;
                }
            } else if (is_string($parentFolderName) && $parentFolderName !== '') {
                $this->url .= $parentFolderName . '/';
            } else {
                $this->url .= $parentFolderName;
            }
        }


        /**
         * 整形されたファイルまでのURLを返すメソッド
         * @param string $fileName 使いたい画像ファイル名
         * @return string
         */
        public function get_file (string $fileName) {
            return $this->url . $fileName;
        }

    }
?>