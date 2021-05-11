<?php

if (isset($_POST['blog-title'])) {
    $blogTitle = json_encode($_POST['blog-title']);
    echo $blogTitle;
}