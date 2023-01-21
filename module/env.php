<?php
    require_once(__DIR__ . '/../lib/url.php');
    // インスタンスメソッドでディレクトリ名を指定していると、インスタンス生成ごとにセットしなければならないため、静的プロパティへ直にセットする。
    URL::$DIR = 'stevens';

    define('root', new URL());
    define('css', new URL('css'));
    define('js', new URL('js'));
    define('images', new URL('images'));
    define('menu', new URL(['page', 'menu']));
    define('reserve', new URL(['page', 'reserve']));
    define('blog', new URL(['page', 'blog']));
    define('contact', new URL(['page', 'contact']));
    define('account_create', new URL(['page', 'account', 'create']));
    define('account_info', new URL(['page', 'account', 'info']));
    define('account_login', new URL(['page', 'account', 'login']));
    define('account_logout', new URL(['page', 'account', 'logout']));