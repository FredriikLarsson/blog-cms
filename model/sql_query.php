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
    return 'SELECT posts.id, posts.title, images.filename FROM posts LEFT JOIN images ON posts.id=images.post_id AND images.type="title" WHERE blog_id=' . $blogId;
}

//Get content about a specific post
function getPost($postId) {
    return 'SELECT posts.title, posts.created, posts.content, users.username, images.filename FROM posts INNER JOIN blogs ON posts.blog_id=blogs.id INNER JOIN users ON blogs.user_id=users.id INNER JOIN images ON blogs.user_id=users.id WHERE posts.id=' . $postId;
}

?>