export const buttonMenu = document.getElementById('button-menu'); //Hamburger button for sidebar
export const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
export const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
export const navMenu = document.getElementById('nav-menu'); //Main navigation menu

//View the sidebar menu 
export function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
export function closeNav() {
    sideBar.style.width = '0';
}