<!-- Header that should exist on many pages -->
<header>
    <div class="header__top">
        <!-- Link to the homepage -->
        <a href="index.php" class="header__logotype"><span class="material-icons">home</span></a>
        <!-- Header section that should have different content on most pages -->
        <?php
        echo '<h1 class="header__title" id="text-title">' . $headerTitle . '</h1>';
        ?>
        <!-- Hamburger menu for sidebar -->
        <button class="sidebar__button--open" id="sidebar__button--open"><span class="material-icons">menu</span></button>
    </div>

    <?php
    require_once('components/nav-menu.php');
    require_once('components/sidebar.php');
    ?>
</header>