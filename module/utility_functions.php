<?php
    require_once(__DIR__ . '/../lib/url.php');
    // インスタンスメソッドでディレクトリ名を指定していると、インスタンス生成ごとにセットしなければならないため、静的プロパティへ直にセットする。
    URL::$DIR = 'stevens';

    // HTML blocs
    function get_head () {
        require_once(__DIR__ . '/../blocks/head.php');
    }

    function get_header () {
        require_once(__DIR__ . '/../blocks/header.php');
    }

    function get_footer () {
        require_once(__DIR__ . '/../blocks/footer.php');
    }

    // class lib
    function get_class_dbh () {
        require_once(__DIR__ . '/../lib/dbh.php');
    }

    function get_class_login () {
        require_once(__DIR__ . '/../lib/login.php');
    }

    function get_class_mail () {
        require_once(__DIR__ . '/../lib/mail.php');
    }

    function get_class_url () {
        require_once(__DIR__ . '/../lib/url.php');
    }

    function get_class_user () {
        require_once(__DIR__ . '/../lib/user.php');
    }

    function get_class_mydate () {
        require_once(__DIR__ . '/../lib/mydate.php');
        date_default_timezone_set('Asia/Tokyo');
    }

    // module
    function get_module_date_format () {
        require_once(__DIR__ . '/../module/date_format.php');
    }

    function get_module_dbh_instance () {
        require_once(__DIR__ . '/../module/dbh_instance.php');
        return $dbh;
    }

    function get_module_get_db_user () {
        require_once(__DIR__ . '/../module/get_db_user.php');
    }
