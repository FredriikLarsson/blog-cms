const buttonMenu = document.getElementById('button-menu'); //Hamburger button for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
const navMenu = document.getElementById('nav-menu'); //Main navigation menu

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

//Hide the entire main navigation menu for this page
window.addEventListener('load', function() {
    navMenu.style.display = 'none';
})

//View the sidebar menu 
function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
function closeNav() {
    sideBar.style.width = '0';
}