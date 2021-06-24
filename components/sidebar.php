<!-- Sidebar menu that is hidden by default -->
<div class="sidebar" id="sidebar">
    <!-- Button for closing the sidebar -->
    <button class="sidebar__button--close" id="sidebar__button--close"><span class="material-icons">close</span></button>
    <?php
    /* Check if user is logged in */
    if (isset($_SESSION['userId'])) {
        /* Links inside the sidebar */
        echo '<a href="controllers/admin_controller.inc.php" id="sidebar__link--blog">Min blogg</a>';
        echo '<a href="controllers/admin_controller.inc.php?images=true" id="sidebar__link--images">Mina bilder</a>';
        echo '<a href="controllers/admin_controller.inc.php?logout=true" id="sidebar__link--logout">Logga ut</a>';
    } else {
        /* Links inside the sidebar if user is not logged in */
        echo '<a href="login.php" id="sidebar__link--login">Logga in/Registrera</a>';
    }
    ?>
</div>