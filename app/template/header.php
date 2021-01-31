<header class="main">
    <?php if (isset($this->session->u->Username)) { ?>
    <a href="javascript:;" data-menu-status="<?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'true' : 'false' ?>" class="menu_switch <?= (isset($_COOKIE['menu_opened']) && $_COOKIE['menu_opened'] == 'true') ? 'opened no_animation' : '' ?>"><i class="fa fa-bars"></i></a>
    <?php } ?>

    <div class="user_menu_container">
        <a href="javascript:;" class="language_switch user">
            <span><?= $text_welcome ?> <?= isset($this->session->u->Username) ? $this->session->u->Username : $text_visitor?></span>
            <i class="material-icons">keyboard_arrow_down</i>
        </a>
        <ul class="user_menu">
        <?php if (isset($this->session->u->Username)) { ?>
            <li><a href="/"><i class="fa fa-user"></i><?= $text_profile ?></a></li>
            <li><a href="/"><i class="fa fa-key"></i><?= $text_change_password ?></a></li>
            <li><a href="/"><i class="fa fa-gear"></i><?= $text_account_settings ?></a></li>
            <li><a href="/auth/logout"><i class="fa fa-sign-out"></i><?= $text_log_out ?></a></li>
        <?php } else { ?>
            <li><a href="/auth/login"><i class="fa fa-sign-in"></i><?= $text_log_in ?></a></li>
        <?php } ?>
        </ul>
    </div>
    <?php if (isset($this->session->u->Username)) { ?>
    <a href="/messages" class="language_switch"><i class="fa fa-envelope"></i></a>
    <a href="javascript:;" class="language_switch notifications"><i class="fa fa-bell"></i></a>
    <?php } ?>
    <a href="/language" class="language_switch lang"><span><?= $_SESSION['lang'] == 'ar' ? 'En' : 'عربي' ?></span> <i class="fa fa-globe"></i></a>
</header>