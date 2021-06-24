<!-- Header that should exist on many pages -->
<header>
    <div class="header-container">
        <!-- Link to the homepage -->
        <a href="index.php" class="logotype"><span class="material-icons">home</span></a>
        <!-- Navigation menu -->
        <?php
        require_once('components/nav-menu.php');
        ?>
        <!-- Button to open sidebar menu -->
        <button class="sidebar__button--open" id="sidebar__button--open"><span class="material-icons">menu</span></button>
    </div>

    <!-- Sidebar -->
    <?php
    require_once('components/sidebar.php');
    ?>
</header>