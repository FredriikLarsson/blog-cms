import {buttonMenu, sideBar, buttonMenuClose, openNav, closeNav} from '/Projekt_Blogg/js/header.js';

const deleteButton = document.getElementsByClassName('post-list__item-button--delete'); //Post-list items delete buttons
const editButton = document.getElementsByClassName('post-list__item-button--edit'); //Post-list items edit buttons


buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

/* All delete buttons to every post in post-list */
Array.from(deleteButton).forEach(element => {
    element.addEventListener('click', function () {
        let postId = element.value; //id of the post
        fetch('/Projekt_Blogg/controllers/post_controller.inc.php', {
            method: 'POST',
            body: JSON.stringify(postId)
        }).then(
            response => response.text()
        ).then(
            data => console.log(data)
        ).catch(
            error => console.log(error)
        )
    })
})
