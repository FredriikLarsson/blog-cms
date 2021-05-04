const buttonMenu = document.getElementById('button-menu');
const sideBar = document.getElementById('menu-sidebar');
const buttonMenuClose = document.getElementById('button-menu-close');
const textTitle = document.getElementById('text-title');
const navButton1 = document.getElementById('nav-button-1')
const navButton2 = document.getElementById('nav-button-2')
const menuLink1 = document.getElementById('menu-link-1');
const menuLink2 = document.getElementById('menu-link-2');

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);
window.addEventListener('load', function() {
    textTitle.innerHTML = 'Nyheter';
    navButton1.innerHTML = 'Senaste inläggen';
    navButton2.innerHTML = 'Nya bloggare';
    menuLink1.innerHTML = 'Logga in/Registrera';
    menuLink2.innerHTML = 'Hjälp';
})


function openNav() {
    sideBar.style.width = '200px';
}

function closeNav() {
    sideBar.style.width = '0';
}