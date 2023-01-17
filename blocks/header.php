<?php
    session_start();
    require_once('module/user.php');
    require_once('module/login.php');
    if (Login::is_login()) {
        $user = unserialize($_COOKIE['user']);
    }
?>
<header class="header js-hamburger__hook">
    <div class="content-w">
        <h1 class="header--title"><a href="./"><img src="images/header_logo.svg" alt="Bordeaux" width="142" height="50"></a></h1>
        <button type="button" class="hamburger-menu" id="js-hamburger__trigger">
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--graph"></span>
            <span class="hamburger-menu--text">MENU</span>
        </button>
        <nav class="gnav js-hamburger__hook">
            <ul class="gnav__container">
                <li class="gnav__container--item"><a class="js-gnav" href="menu.php">MenuList</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="reserve.php">Reserve</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="blog.php">Blog</a></li>
                <li class="gnav__container--item"><a class="js-gnav" href="contact.php">Contact</a></li>
                <li class="gnav__container--item">
                    <?php if (Login::is_login()): ?>
                        <a class="js-gnav" href="account_logout.php"><i class="fa-solid fa-circle-user"></i><?php echo $user->get_userName()['full']; ?></a>
                    <?php else: ?>
                        <a class="js-gnav" href="account.php"><i class="fa-solid fa-circle-user"></i>Account</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>