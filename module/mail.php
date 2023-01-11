<?php
    class ToMail {

        protected $subjects = ['質問', 'お店へのお問い合わせ', '予約の取り消し', 'サイトの質問'];
        protected $subject = 0;
        protected $name = [];
        protected $mail = '';
        protected $tel = [];
        protected $msg = '';

        /**
         * @param number $to_subject お問い合わせの件名(インデックス番号)['質問', 'お店へのお問い合わせ', '予約の取り消し', 'サイトの質問']
         * @param array{'firstName': string, 'lastName': string} $to_name 宛先の氏名
         * @param string $to_address 宛先のメールアドレス
         * @param array{'firstTel': string, 'middleTel': string, 'lastTel': string} $to_tel 宛先の電話番号
         * @param string $msg メールのメッセージ
         * @return ToMail
         */
        public function  __construct($to_subject, $to_name, $to_address, $to_tel, $msg) {
            $this->subject = $this->subjects[$to_subject];
            $this->name = [
                'full' => $to_name['firstName'] . '　' . $to_name['lastName'],
                'provide' => [$to_name['firstName'], $to_name['lastName']]
            ];
            $this->mail = $to_address;
            $this->tel = [
                'full' =>  $to_tel['firstTel'] . '-' . $to_tel['middleTel'] . '-' . $to_tel['lastTel'],
                'provide' => [$to_tel['firstTel'], $to_tel['middleTel'], $to_tel['lastTel']]
            ];
            $this->msg = $msg;
        }

        protected function mail_text () {
            $txt = '';
            $n = "\r\n";
            $array_txt = [
                $this->name['full'] . ' 様' . $n,
                'こんにちは！' . $n,
                '美容院 Bordeaux(ボルドー)でございます。' . $n . $n,
                '-------------------------------------------------'  . $n . $n,
                $this->name['full'] . '様、この度はBordeaux(ボルドー)のサイトをご覧いただき、誠にありがとうございます。' . $n . $n,
                '以下の内容でお問い合わせフォームより受付いたしましたのでご査収下さい。' . $n . $n,
                '件名： ' . $this->subject . $n . $n,
                '氏名： ' . $this->name['full'] . $n . $n,
                'メールアドレス： ' . $this->mail . $n . $n,
                '電話番号： ' . $this->tel['full'] . $n . $n,
                'お問い合わせ内容：' . $n,
                '　' . $this->msg . $n . $n,
                '追ってご連絡させていただきます。' . $n . $n,
                '-------------------------------------------------' . $n . $n,
                '美容院 Bordeaux' . $n . $n,
                '広報部' . $n . $n,
                'Tel：080-9503-4501' . $n . $n,
                'Mail：' . $this->from . $n . $n,
                '-------------------------------------------------'
            ];
            foreach ($array_txt as $row) {
                $txt .= $row;
            }
            return $txt;
        }

        protected $from = '214002@himejo.jp';
        protected $reply_to = '214002@himejo.jp';
        protected function mail_head () {
            return [
                'From' => $this->from,
                'Reply-To' => $this->reply_to,
                'Content-Type' => 'text/plain; charset=ISO-2022-JP'
            ];
        }

        public function send () {
            mb_language('ja');
            mb_internal_encoding('UTF-8');
            mb_send_mail(
                $this->mail,
                '【控え】 Bordeaux(ボルドー)へのお問い合わせ内容',
                $this->mail_text(),
                $this->mail_head()
            );
        }

        public function get_subject() {
            return $this->h($this->subject);
        }

        public function get_full_name() {
            return $this->h($this->name['full']);
        }

        public function get_provide_name() {
            return $this->name['provide'];
        }

        public function get_mail() {
            return $this->h($this->mail);
        }

        public function get_full_tel() {
            return $this->h($this->tel['full']);
        }

        public function get_provide_tel() {
            return $this->tel['provide'];
        }

        public function get_msg() {
            return $this->msg;
        }

        public function get_bind_msg() {
            return nl2br($this->h($this->msg));
        }

        private function h($string) {
            return htmlspecialchars($string);
        }

    }



    class ToMeMail extends ToMail {

        protected function mail_text () {
            $txt = '';
            $n = "\r\n";
            $array_txt = [
                $this->name['full'] . ' 様よりお問い合わせです。' . $n,
                '-------------------------------------------------'  . $n . $n,
                $n,
                '件名： ' . $this->subject . $n . $n,
                '氏名： ' . $this->name['full'] . $n . $n,
                'メールアドレス： ' . $this->mail . $n . $n,
                '電話番号： ' . $this->tel['full'] . $n . $n,
                'お問い合わせ内容：' . $n,
                '　' . $this->msg . $n . $n,
                $n,
                '-------------------------------------------------'  . $n . $n
            ];
            foreach ($array_txt as $row) {
                $txt .= $row;
            }
            return $txt;
        }

        protected function mail_head () {
            return [
                'From' => $this->from,
                'Reply-To' => $this->reply_to = $this->mail,
                'Content-Type' => 'text/plain; charset=ISO-2022-JP'
            ];
        }

        public function send () {
            mb_language('ja');
            mb_internal_encoding('UTF-8');
            mb_send_mail(
                $this->from,
                '【Bordeaux】 サイトからのお問い合わせ',
                $this->mail_text(),
                $this->mail_head()
            );
        }

    }

?>