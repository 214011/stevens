<?php
    session_start();
    require_once(__DIR__ . '/../lib/user.php');
    require_once(__DIR__ . '/../lib/login.php');
    require_once(__DIR__ . '/../lib/url.php');

    $root = new URL();
    $images = new URL('images');

    if (Login::is_login()) {
        $user = unserialize($_COOKIE['user']);
    }
?>
<header class="header js-hamburger__hook">
    <div class="content-w">
        <h1 class="header--title"><a href="./"><img src="<?php echo $images->get_file('header_logo.svg'); ?>" alt="Bordeaux" width="142" height="50"></a></h1>
        <button type="button" class="hamburger-menu" id="js-hamburger__trigger">
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--text">MENU</span>
        </button>
        <nav class="gnav js-hamburger__hook">
            <ul class="gnav__container">
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $root->get_file('menu.php'); ?>">MenuList</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $root->get_file('reserve.php'); ?>">Reserve</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $root->get_file('blog.php'); ?>">Blog</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="<?php echo $root->get_file('page_contact/'); ?>">Contact</a></li>
                <li class="gnav__container--item">
                    <?php if (Login::is_login()): ?>
                        <a class="js-gnav" href="<?php echo $root->get_file('account_info.php'); ?>"><i class="fa-solid fa-circle-user"></i><?php echo $user->get_userName()['full']; ?></a>
                    <?php else: ?>
                        <a class="js-gnav" href="<?php echo $root->get_file('account.php'); ?>"><i class="fa-solid fa-circle-user"></i>Account</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>