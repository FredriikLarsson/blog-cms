<div class="blog-info">
    <h1 class="blog-header">Blogg</h1>
    <img <?php echo 'src="' . getBlogImage($_GET['blogId']) . '"' ?> alt="" class="blog-image">
    <h2 class="blog-title"> <?php echo getBlogTitle($_GET['blogId']) ?></h1>
    <p class="blog-description"> <?php echo getBlogDescription($_GET['blogId']) ?> </p>
</div>