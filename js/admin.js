import { buttonMenu, sideBar, buttonMenuClose, openNav, closeNav, navMenu } from '/~frelab-8/Projekt_Blogg/js/header.js';

const deleteButton = document.getElementsByClassName('list__item--delete'); //Post-list items delete buttons

buttonMenu.addEventListener('click', openNav);
buttonMenuClose.addEventListener('click', closeNav);

//Hide the entire main navigation menu for this page
window.addEventListener('load', function () {
    navMenu.style.display = 'none';
})

/* All delete buttons to every post in post-list */
Array.from(deleteButton).forEach(element => {
    element.addEventListener('click', function () {
        let postId = element.value; //id of the post
        fetch('http://www.student.ltu.se/~frelab-8/Projekt_Blogg/controllers/post_controller.inc.php', {
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

//Hide the entire main navigation menu for this page
window.addEventListener('load', function () {
    navMenu.style.display = 'none';
})
