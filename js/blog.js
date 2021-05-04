const buttonMenu = document.getElementById('button-menu'); //Hamburger menu for sidebar
const buttonMenuClose = document.getElementById('button-menu-close'); //Closebutton for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar
const menuLink3 = document.getElementById('menu-link-3'); //Link 3 in sidebar
const navButton3 = document.getElementById('nav-button-3'); //Button 3 in main nav menu

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);
window.addEventListener('load', function() {
    menuLink3.style.display = 'block';
    navButton3.style.display = 'inline-block';
})

function openNav() {
    sideBar.style.width = '200px';
}

function closeNav() {
    sideBar.style.width = '0';
}