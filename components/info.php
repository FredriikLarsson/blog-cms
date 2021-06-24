<!-- Card with info about the blog -->
<div class="card">
    <!-- Header of the card -->
    <h1 class="card__header">Blogg</h1>
    <!-- Image for the blog -->
    <img <?php echo 'src="' . getBlogImage($_GET['blogId']) . '"' ?> alt="" class="card__image">
    <!-- Title for the blog -->
    <h2 class="card__title"> <?php echo getBlogTitle($_GET['blogId']) ?></h2>
        <!-- A small description of the blog -->
        <p class="card__description"> <?php echo getBlogDescription($_GET['blogId']) ?> </p>
</div>