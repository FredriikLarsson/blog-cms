const navMenu = document.getElementById('nav-menu'); //Main nav menu
const buttonMenu = document.getElementById('button-menu'); //Hamburger menu for sidebar
const sideBar = document.getElementById('menu-sidebar'); // Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close');// Close button for sidebar

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

window.addEventListener('load', function() {
    navMenu.style.display = 'none';
})


function openNav() {
    sideBar.style.width = '200px';
}

function closeNav() {
    sideBar.style.width = '0';
}

