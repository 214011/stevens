<?php
    class ToMail {

        /**
         * @param string $to_subject お問い合わせの件名
         * @param array{'firstName': string, 'lastName': string} $to_name 宛先の氏名
         * @param string $to_address 宛先のメールアドレス
         * @param array{'firstTel': string, 'middleTel': string, 'lastTel': string} $to_tel 宛先の電話番号
         * @param string $contact_msg お問い合わせ内容
         * @return ToMail
         */
        public function  __construct($to_subject, $to_name, $to_address, $to_tel, $contact_msg) {
            mb_language('ja');
            mb_internal_encoding('UTF-8');
            session_start();
            $_SESSION['toSubject'] = $to_subject;
            $_SESSION['toName'] = $to_name['firstName'] . '　' . $to_name['firstName'];
            $_SESSION['toMail'] = $to_address;
            $_SESSION['toTel'] = $to_tel['firstTel'] . '-' . $to_tel['middleTel'] . '-' . $to_tel['lastTel'];
            $_SESSION['toContactMsg'] = $contact_msg;
            $this-> mailText = $_SESSION['toName'] . '様\n\n'
			. '初めまして。\n'
			. '美容院Bordeaux(ボルドー)でございます。\n\n'
			. '-------------------------------------------------\n\n'
			. $_SESSION['toName'] . '様、この度はBordeaux(ボルドー)のサイトをご覧いただき、誠にありがとうございます。\n\n'
			. '以下の内容でお問い合わせフォームより受付いたしましたのでご査収下さい。\n\n'
            . '件名： ' . $_SESSION['toSubject'] . '\n\n'
			. '氏名： ' . $_SESSION['toName'] . '\n\n'
			. 'メールアドレス： ' . $_SESSION['toMail'] . '\n\n'
			. '電話番号： ' . $_SESSION['toTel'] . '\n\n'
			. 'お問い合わせ内容：\n'
			. $_SESSION['toContactMsg'] . '\n\n'
			. '追ってご連絡させていただきます。\n\n'
			. '-------------------------------------------------\n\n'
			. '姫路情報システム専門学校\n\n'
			. '野村　純平\n\n'
			. 'Tel：080-9503-4501\n\n'
			. 'Mail：214002@himejo.jp\n\n'
			. '-------------------------------------------------';;
        }

        private $subject = '【控え】 Bordeaux(ボルドー)へのお問い合わせ内容';

        private $mailText = '';

        private $siteAddress = 'jnpnmr1227@nmjuune.site';
        private $myEmail = '214002@himejo.jp';
        private $mailHead = 'From: ' . 'jnpnmr1227@nmjuune.site' . '\r\n'
        . 'Reply-To: ' . '214002@himejo.jp' . '\r\n'
        . 'Content-Type: text/plain; charset=ISO-2022-JP\r\n';

        public function send () {
            mb_send_mail(
                $_SESSION['toMail'],
                $this->subject,
                $this->mailText,
                $this->mailHead
            );
        }

        public function showAll () {
            echo $_SESSION['toSubject'];
            echo $_SESSION['toName'];
            echo $_SESSION['toMail'];
            echo $_SESSION['toTel'];
            echo $_SESSION['toContactMsg'];
        }

    }

    

?>