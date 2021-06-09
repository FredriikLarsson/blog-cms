import { buttonMenu, sideBar, buttonMenuClose, navMenu, openNav, closeNav } from '/Projekt_Blogg/js/header.js';

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

window.addEventListener('load', function () {
    navMenu.style.display = 'none';
})
