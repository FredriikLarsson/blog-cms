<?php

//Get the 10 latest post uploaded to the cms system
function getLatestPosts() {
    return 'SELECT posts.id, posts.title, images.filename FROM posts LEFT JOIN images ON posts.id=images.post_id AND images.type="title" ORDER BY posts.created DESC LIMIT 10';
}

//Get the 10 latest registered blogs
function getLatestBlogs() {
    return 'SELECT * FROM blogs ORDER BY created DESC LIMIT 10';
}

//Get a information about a blog
function getBlog($blogId) {
    return 'SELECT * FROM blogs WHERE id=' . $blogId;
}

//Get posts from a specific blog
function getBlogPosts($blogId) {
    return 'SELECT * FROM posts WHERE blog_id=' . $blogId;
}

?>