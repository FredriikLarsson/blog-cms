<!-- Sidebar menu that is hidden by default. -->
<div class="menu-sidebar" id="menu-sidebar">
    <button class="button-menu-close" id="button-menu-close"><span class="material-icons">close</span></button>
    <?php
    if (isset($_SESSION['userId'])) {
        echo '<a href="admin.php" id="menu-link-blog">Min blogg</a>';
        echo '<a href="controllers/admin_controller.inc.php?logout=true" id="menu-link-logout">Logga ut</a>';
    } else {
        echo '<a href="login.php" id="menu-link-login">Logga in/Registrera</a>';
    }
    ?>
</div>