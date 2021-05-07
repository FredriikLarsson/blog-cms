const buttonMenu = document.getElementById('button-menu'); //Hamburger menu for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
const listNewsPosts = document.getElementById('list-news-posts'); //List of 10 latest blog post
const listNewsBloggers = document.getElementById('list-news-bloggers'); //List of 10 latest bloggers on the platform
const navButtonBloggers = document.getElementById('nav-button-2'); //Main nav button for showing list of latest bloggers
const navButtonPosts = document.getElementById('nav-button-1'); //Main nav button for showing list of latest posts


buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

window.addEventListener('load', function() {
    //list of 10 latest blog post should as default be hidden
    listNewsPosts.style.display = 'none';
})

//Button with event to show latest bloggers on platform
navButtonBloggers.addEventListener('click', function() {
    listNewsPosts.style.display = 'none';
    listNewsBloggers.style.display = 'flex';
})

//Button with event to show latest posts on platform
navButtonPosts.addEventListener('click', function() {
    listNewsPosts.style.display = 'flex';
    listNewsBloggers.style.display = 'none';
})

//View the sidebar menu by sliding it out from the side. 
function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
function closeNav() {
    sideBar.style.width = '0';
}