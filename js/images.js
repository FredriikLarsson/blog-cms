import { buttonMenu, sideBar, buttonMenuClose, navMenu, openNav, closeNav } from '/~frelab-8/Projekt_Blogg/js/header.js';

const deleteButton = document.getElementsByClassName('list__item--delete'); //Image-list items delete buttons
const editButton = document.getElementsByClassName('list__item--edit'); //Image-list items edit buttons
const hideFormButton = document.getElementById('button_cancel'); //Cancel button for add image popup
const viewFormButton = document.getElementById('button_form'); //Button to show add image popup
const uploadButton = document.getElementById('button_upload'); //Button to upload a new image
const form = document.getElementById('form'); //Form with image information

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);
hideFormButton.addEventListener('click', closeForm);
viewFormButton.addEventListener('click', openForm);

/* All delete buttons to every image in image-list */
Array.from(deleteButton).forEach(element => {
    element.addEventListener('click', function () {
        let imageId = element.value; //id of the image
        fetch('http://www.student.ltu.se/~frelab-8/Projekt_Blogg/controllers/image_controller.inc.php', {
            method: 'POST',
            body: JSON.stringify(imageId)
        }).then(
            response => response.text()
        ).then(
            data => console.log(data)
        ).catch(
            error => console.log(error)
        )
    })
})

/* All edit buttons to every image in image-list */
Array.from(editButton).forEach(element => {
    element.addEventListener('click', function () {
        let editForm = 'edit--' + element.value; //id of the form at the specific image chosen to edit
        document.getElementById(editForm).style.display = 'block';
    })
})

uploadButton.addEventListener('click', function () {
    //Send image to server
    fetch('http://www.student.ltu.se/~frelab-8/Projekt_Blogg/services/upload_service.php', {
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

//View the add image popup
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

//Hide the add image popup
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
