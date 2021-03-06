<?php

/* USERS */

//Get all users from the database
function getAllUsers()
{
    return 'SELECT users.username, users.password FROM users';
}

//add new user to the database
function addUser($username, $password)
{
    return 'INSERT INTO users (username, password) VALUES (\'' . $username . '\', \'' . $password . '\');';
}

/*get user information 
@param username = username of user, not user_id*/
function getUser($username)
{
    return 'SELECT * FROM users WHERE username=\'' . $username . '\'';
}


/* POSTS */

//Get the 10 latest post uploaded to the cms system
function getLatestPosts()
{
    return 'SELECT * FROM posts ORDER BY posts.created DESC LIMIT 10';
}

//Get posts from a specific blog
function getBlogPosts($blogId)
{
    return 'SELECT * FROM posts WHERE blog_id=' . $blogId;
}

//Get information about a specific post
function getPost($postId)
{
    return 'SELECT posts.title, posts.created, posts.content, users.username, posts.image FROM posts 
    INNER JOIN blogs ON posts.blog_id=blogs.id INNER JOIN users ON blogs.user_id=users.id WHERE posts.id=' . $postId;
}

//add a new post to the database
function addPost($title, $content, $image, $created, $blogId)
{
    return 'INSERT INTO posts (title, content, image, created, blog_id) 
    VALUES (\'' . $title . '\', \'' . $content . '\', \'' . $image . '\', \'' . $created . '\', \'' . $blogId . '\');';
}

//delete a post from the database
function deleteBlogPost($postId)
{
    return 'DELETE FROM posts WHERE id=' . $postId;
}

function alterPost($postId, $title, $content, $image) 
{
    return 'UPDATE posts SET title =\'' . $title . '\', content =\'' . $content . '\', image =\'' . $image . '\' WHERE id=' . $postId;
}



/* BLOGS */

//Get all the blogs on the platform
function getAllBlogs()
{
    return 'SELECT * FROM blogs';
}

//Get the 10 latest registered blogs
function getLatestBlogs()
{
    return 'SELECT * FROM blogs ORDER BY created DESC LIMIT 10';
}

//Get information about a specific blog
function getBlog($blogId)
{
    return 'SELECT * FROM blogs WHERE id=' . $blogId;
}

//get blog that is owned by a specific user
function selectUserBlog($userId)
{
    return 'SELECT blogs.id, blogs.title, blogs.presentation, blogs.image, blogs.created FROM blogs INNER JOIN users ON blogs.user_id=users.id WHERE users.username=\'' . $userId . '\'';
}

//add a new blog to the database
function addBlog($title, $presentation, $image, $created, $userId)
{
    return 'INSERT INTO blogs (title, presentation, image, created, user_id) 
    VALUES (\'' . $title . '\', \'' . $presentation . '\', \'' . $image . '\', \'' . $created . '\', \'' . $userId . '\');';
}



/* IMAGE */
//Add a new image to a specific blog
function insertNewImage($filename, $description, $created, $blogId)
{
    return 'INSERT INTO images (filename, description, created, blog_id_)
    VALUES (\'' . $filename . '\', \'' . $description . '\', \'' . $created . '\', \'' . $blogId . '\');';
}

//get all images for a specific blog
function selectAllBlogImages($blogId)
{
    return 'SELECT * FROM images WHERE blog_id_=' . $blogId;
}

//delete a image from the database
function deleteBlogImage($imageId)
{
    return 'DELETE FROM images WHERE id=' . $imageId;
}

//Get one image
function selectImage($imageId)
{
    return 'SELECT * FROM images WHERE id=' . $imageId;
}

function alterImageText($imageId, $altText) 
{
    return 'UPDATE images SET description =\'' . $altText . '\' WHERE id=' . $imageId;
}
