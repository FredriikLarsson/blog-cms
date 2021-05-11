<?php

/* Messages about how the file upload went */
$upload_errors = array(
    UPLOAD_ERR_OK          => "Inga fel.",
    UPLOAD_ERR_INI_SIZE    => "Filen är större än den storlek som anges i php.ini (upload_max_filesize).",
    UPLOAD_ERR_FORM_SIZE   => "Filen är större än den största filstorlek som tillåts av formuläret (MAX_FILE_SIZE).",
    UPLOAD_ERR_PARTIAL     => "Filen blev delvis uppladdad.",
    UPLOAD_ERR_NO_FILE     => "Ingen fil är vald.",
    UPLOAD_ERR_NO_TMP_DIR  => "Ingen temporär katalog finns på webbservern.",
    UPLOAD_ERR_CANT_WRITE  => "Kan inte skriva till disk.",
    UPLOAD_ERR_EXTENSION   => "Filuppladdningen är stoppad av ett tillägg (extension)."
);

/* Move image that is sent in through a form, to a specific permanently location on the server */
if (file_exists($_FILES['blog-image']['tmp_name'])) {
    $tmp_file = $_FILES['blog-image']['tmp_name']; //Temp filename on server for sent in image through post request
    $upload_dir = "../uploads/"; //Directory on server that image is going to be stored in
    $target_file = basename($_FILES['blog-image']['name']); //Image name on the server when stored correctly
    //check if image upload went through
    if (move_uploaded_file($tmp_file, $upload_dir . $target_file)) {
        $message = "Filen har laddats upp.";
        echo json_encode($message);
        //Something went wrong during the upload
    } else {
        $error = $_FILES['blog-image']['error'];
        $message = $upload_errors[$error];
        echo json_encode($message);
    }
    /* In case no file has been chosen to upload */
} else {
    $message = 'Välj en fil att ladda upp.';
    echo $message;
}
