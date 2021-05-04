<!-- Header that should exist on every page -->
<header>
    <div class="header-top">
        <!-- Link to the homepage (landing page) -->
        <a href="/Projekt_Blogg/index.php" class="link-logotype"><span class="material-icons">home</span></a>
        <?php
            echo '<h1 class="text-title" id="text-title">' . $headerTitle . '</h1>';
        ?>
        <button class="button-menu" id="button-menu"><span class="material-icons">menu</span></button> 
    </div>

    <?php
        require_once('components/nav-menu.php');
        require_once('components/sidebar.php');
    ?>
</header>