const buttonMenu = document.getElementById('button-menu'); //Hamburger button for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
const navMenu = document.getElementById('nav-menu'); //Main navigation menu
const imageListButtonDelete = document.getElementsByClassName('image-list__item-button--delete'); //Image-list items delete buttons

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

/* All delete buttons to every image in image-list */
Array.from(imageListButtonDelete).forEach(element => {
    element.addEventListener('click', function () {
        $imageId = element.value; //id of the image
        fetch('/Projekt_Blogg/controllers/image_controller.inc.php', {
            method: 'POST',
            body: JSON.stringify($imageId)
        }).then(
            response => response.json()
        ).then(
            data => alert(data)
        )
    })
})

//Hide the entire main navigation menu for this page
window.addEventListener('load', function () {
    navMenu.style.display = 'none';
})

//View the sidebar menu 
function openNav() {
    sideBar.style.width = '200px';
}

//Hide the sidebar menu
function closeNav() {
    sideBar.style.width = '0';
}
