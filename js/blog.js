const buttonMenu = document.getElementById('button-menu'); //Hamburger menu for sidebar
const buttonMenuClose = document.getElementById('button-menu-close'); //Closebutton for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar
const menuLink3 = document.getElementById('menu-link-3'); //Link 3 in sidebar
const navButton3 = document.getElementById('nav-button-3'); //Button 3 in main nav menu

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);
window.addEventListener('load', function() {
    navButton3.style.display = 'inline-block';
})

//View the sidebar menu by sliding it out from the side. 
function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
function closeNav() {
    sideBar.style.width = '0';
}