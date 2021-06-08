const buttonMenu = document.getElementById('button-menu'); //Hamburger button for sidebar
const sideBar = document.getElementById('menu-sidebar'); //Sidebar menu
const buttonMenuClose = document.getElementById('button-menu-close'); //Close button for sidebar
const navMenu = document.getElementById('nav-menu'); //Main navigation menu
const imageListButtonDelete = document.getElementsByClassName('image-list__item-button--delete'); //Image-list items delete buttons
const imageListButtonEdit = document.getElementsByClassName('image-list__item-button--edit'); //Image-list items edit buttons
const buttonCancel = document.getElementById('button_cancel'); //Cancel button for add image popup
const buttonForm = document.getElementById('button_form'); //Button to show add image popup
const buttonUpload = document.getElementById('button_upload'); //Button to upload a new image
const form = document.getElementById('form'); //Form with image information
const imageListButtonOK = document.getElementsByClassName('button_ok'); //complete text edit of image alt-text

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);
buttonCancel.addEventListener('click', closeForm);
buttonForm.addEventListener('click', openForm);

/* All delete buttons to every image in image-list */
Array.from(imageListButtonDelete).forEach(element => {
    element.addEventListener('click', function () {
        $imageId = element.value; //id of the image
        fetch('/Projekt_Blogg/controllers/image_controller.inc.php', {
            method: 'POST',
            body: JSON.stringify($imageId)
        }).then(
            response => response.text()
        ).then(
            data => console.log(data)
        ).catch(
            error => console.log(error)
        )
    })
})


Array.from(imageListButtonEdit).forEach(element => {
    element.addEventListener('click', function () {
        $editForm = 'edit--' + element.value;
        document.getElementById($editForm).style.display = 'block';
    })
})

buttonUpload.addEventListener('click', function () {
    //Send image to server
    fetch('/Projekt_Blogg/services/upload_service.php', {
        method: 'POST',
        body: new FormData(form)
    }).then(
        response => response.json()
    ).then(
        data => console.log(data)
    )
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

//View the add image popup
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

//Hide the add image popup
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
