const buttonMenu = document.getElementById('button-menu'); //Hamburger button for sidebar
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

//View the sidebar menu
function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
function closeNav() {
    sideBar.style.width = '0';
}