<?php
    /**
     * DateTimeクラスから継承したDateクラス（JSのDateクラスのような振る舞い）
     */
    class MyDate extends DateTime {

        private const FORMAT__FULL_YEAR = 'Y';
        private const FORMAT__MONTH = 'm';
        private const FORMAT__DATE = 'd';
        private const FORMAT__DAY = 'w';
        private const FORMAT__HOURS = 'H';
        private const FORMAT__MINUTES = 'i';
        private const FORMAT__SECONDS = 's';

        public const LAST_DAY = 'last day of this month';

        /**
         * 年が返るメソッド
         * @return int
         */
        public function getFullYear(): int {
            return $this->format(self::FORMAT__FULL_YEAR);
        }

        /**
         * 月が返るメソッド
         * @return int
         */
        public function getMonth(): int {
            return $this->format(self::FORMAT__MONTH);
        }

        /**
         * 日にちが返るメソッド
         * @return int
         */
        public function getDate(): int {
            return $this->format(self::FORMAT__DATE);
        }

        /**
         * 曜日が数値で返るメソッド
         * @return int
         */
        public function getDay(): int {
            return $this->format(self::FORMAT__DAY);
        }

        /**
         * 何時かが返るメソッド
         * @return int
         */
        public function getHours(): int {
            return $this->format(self::FORMAT__HOURS);
        }

        /**
         * 分数が返るメソッド
         * @return int
         */
        public function getMinutes(): int {
            return $this->format(self::FORMAT__MINUTES);
        }

        /**
         * 秒数が返るメソッド
         * @return int
         */
        public function getSeconds(): int {
            return $this->format(self::FORMAT__SECONDS);
        }

        /**
         * 日本語で曜日が返るメソッド
         * @return string
         */
        public static function ja_week_format (int $day): string {
            $week = ['日', '月', '火', '水', '木', '金', '土'];
            return $week[$day];
        }

    }