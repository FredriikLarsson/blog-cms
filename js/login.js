const errorMsg = document.getElementById('error-msg'); //html element for error msg if username or password is incorrect

window.addEventListener('load', function() {
    if (window.location.search.substr(1) == 'invalidCredentials=true') {
        errorMsg.innerHTML = 'Felaktigt användarnamn eller lösenord';
        errorMsg.style.fontWeight = '700';
        errorMsg.style.color = 'red';
        errorMsg.style.marginBottom = '20px';
        errorMsg.style.marginTop = '5px';
    }
})