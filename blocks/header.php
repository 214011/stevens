<?php
    session_start();
    get_class_login();
    get_class_user();
    $root = new URL();
    $images = new URL('images');
    $menu = new URL(['page', 'menu']);
    $reserve = new URL(['page', 'reserve']);
    $blog = new URL(['page', 'blog']);
    $contact = new URL(['page', 'contact']);
    $account_create = new URL(['page', 'account', 'create']);
    $account_info = new URL(['page', 'account', 'info']);
    if (Login::is_login()) {
        $user = unserialize($_COOKIE['user']);
    }
?>
<header class="header js-hamburger__hook">
    <div class="content-w">
        <h1 class="header--title"><a href="<?php echo $root->get_file(''); ?>"><img src="<?php echo $images->get_file('header_logo.svg'); ?>" alt="Bordeaux" width="142" height="50"></a></h1>
        <button type="button" class="hamburger-menu" id="js-hamburger__trigger">
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--text">MENU</span>
        </button>
        <nav class="gnav js-hamburger__hook">
            <ul class="gnav__container">
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $menu->get_file(''); ?>">MenuList</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $reserve->get_file(''); ?>">Reserve</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $blog->get_file(''); ?>">Blog</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $contact->get_file(''); ?>">Contact</a></li>
                <li class="gnav__container--item">
                    <?php if (Login::is_login()): ?>
                        <a class="js-gnav" href="<?php echo $account_info->get_file(''); ?>"><i class="fa-solid fa-circle-user"></i><?php echo $user->get_userName()['full']; ?></a>
                    <?php else: ?>
                        <a class="js-gnav" href="<?php echo $account_create->get_file(''); ?>"><i class="fa-solid fa-circle-user"></i>Account</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>