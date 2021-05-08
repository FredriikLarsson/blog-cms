const buttonMenu = document.getElementById('button-menu'); //Hamburger menu for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

//View the sidebar menu by sliding it out from the side. 
function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
function closeNav() {
    sideBar.style.width = '0';
}