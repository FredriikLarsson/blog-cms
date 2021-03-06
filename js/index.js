import { buttonMenu, sideBar, buttonMenuClose, openNav, closeNav, activeNavButton} from '/Projekt_Blogg/js/header.js';

const listPosts = document.getElementById('list__posts'); //List of the 10 latest post
const listBloggers = document.getElementById('list__bloggers'); //List of the 10 latest bloggers on the platform
const navButtonBloggers = document.getElementById('nav-button-2'); //Main nav button for showing list of latest bloggers
const navButtonPosts = document.getElementById('nav-button-1'); //Main nav button for showing list of latest posts

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

window.addEventListener('load', function () {
    //list of the 10 latest blog post should as default be hidden
    listPosts.style.display = 'none';
    activeNavButton(navButtonBloggers, '#46549e');
})

//Show the 10 latest bloggers on the platform
navButtonBloggers.addEventListener('click', function () {
    activeNavButton(navButtonBloggers, '#46549e');
    navButtonPosts.style.color = 'black';
    navButtonPosts.style.textDecoration = 'none';
    listPosts.style.display = 'none';
    listBloggers.style.display = 'flex';
})

//Show the 10 latest posts on the platform
navButtonPosts.addEventListener('click', function () {
    activeNavButton(navButtonPosts, '#46549e');
    navButtonBloggers.style.color = 'black';
    navButtonBloggers.style.textDecoration = 'none';
    listPosts.style.display = 'flex';
    listBloggers.style.display = 'none';
})
