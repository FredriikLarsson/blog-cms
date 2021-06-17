import {buttonMenu, sideBar, buttonMenuClose, openNav, closeNav, navMenu} from '/Projekt_Blogg/js/header.js';

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

window.addEventListener('load', function() {
    navMenu.style.display = 'none';
})