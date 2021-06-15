<!-- Sidebar menu that is hidden by default -->
<div class="header__sidebar" id="menu-sidebar">
    <!-- button for closing the sidebar -->
    <button class="sidebar__button--close" id="sidebar__button--close"><span class="material-icons">close</span></button>
    <?php
    /* Checks if user is logged in */
    if (isset($_SESSION['userId'])) {
        echo '<a href="controllers/admin_controller.inc.php" id="menu-link-blog">Min blogg</a>';
        echo '<a href="controllers/admin_controller.inc.php?images=true" id="menu-link-images">Mina bilder</a>';
        echo '<a href="controllers/admin_controller.inc.php?logout=true" id="menu-link-logout">Logga ut</a>';
        /* if user is not logged in */
    } else {
        echo '<a href="login.php" id="menu-link-login">Logga in/Registrera</a>';
    }
    ?>
</div>