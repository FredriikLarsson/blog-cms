export const buttonMenu = document.getElementById('sidebar__button--open'); //Hamburger button for sidebar
export const sideBar = document.getElementById('sidebar'); //Sidebar menu
export const buttonMenuClose = document.getElementById('sidebar__button--close'); //Close button for sidebar
export const navMenu = document.getElementById('nav-menu'); //Main navigation menu

//View the sidebar menu 
export function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
export function closeNav() {
    sideBar.style.width = '0';
}

//Add underline of an active button
export function activeNavButton(button, color) {
    button.style.textDecoration = 'underline';
    button.style.color = color;
}