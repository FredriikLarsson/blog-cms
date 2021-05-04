const buttonMenu = document.getElementById('button-menu');
const buttonMenuClose = document.getElementById('button-menu-close');
const sideBar = document.getElementById('menu-sidebar');
const textTitle = document.getElementById('text-title');
const navButton1 = document.getElementById('nav-button-1');
const navButton2 = document.getElementById('nav-button-2');
const navButton3 = document.getElementById('nav-button-3');
const menuLink1 = document.getElementById('menu-link-1');
const menuLink2 = document.getElementById('menu-link-2');
const menuLink3 = document.getElementById('menu-link-3');

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);
window.addEventListener('load', function() {
    textTitle.innerHTML = 'Blogg titel';
    navButton1.innerHTML = 'Visa alla';
    navButton2.innerHTML = 'Design';
    navButton3.innerHTML = 'Systemutveckling';
    navButton3.style.display = 'inline';
    menuLink1.innerHTML = 'Om mig';
    menuLink2.innerHTML = 'Hjälp';
    menuLink3.innerHTML = 'Kontakta mig';
    menuLink3.style.display = 'block';
})

function openNav() {
    sideBar.style.width = '200px';
}

function closeNav() {
    sideBar.style.width = '0';
}