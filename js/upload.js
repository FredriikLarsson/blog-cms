const form = document.getElementById('form'); //Form with input to create a new blog
const uploadButton = document.getElementById('button-upload'); //button to upload image
const uploadMessage = document.getElementById('upload-message'); //where upload error messages is presented

uploadButton.addEventListener('click', function () {
    //Send image to server
    fetch('/Projekt_Blogg/services/upload_service.php', {
        method: 'POST',
        body: new FormData(form)
    }).then(
        response => response.json()
    ).then(
        data => uploadMessage.innerHTML = data
    )
})
