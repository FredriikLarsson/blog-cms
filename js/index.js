const buttonMenu = document.getElementById('button-menu'); //Hamburger menu for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
const listNewsPosts = document.getElementById('list-news-posts'); //List of 10 latest blog post
const navButtonBloggers = document.getElementById('nav-button-2');
const navButtonPosts = document.getElementById('nav-button-1');
const listNewsBloggers = document.getElementById('list-news-bloggers');

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

window.addEventListener('load', function() {
    //list of 10 latest blog post should as default be hidden
    listNewsPosts.style.display = 'none';
})

navButtonBloggers.addEventListener('click', function() {
    listNewsPosts.style.display = 'flex';
    listNewsBloggers.style.display = 'none';
})

navButtonPosts.addEventListener('click', function() {
    listNewsPosts.style.display = 'none';
    listNewsBloggers.style.display = 'flex';
})


function openNav() {
    sideBar.style.width = '200px';
}

function closeNav() {
    sideBar.style.width = '0';
}