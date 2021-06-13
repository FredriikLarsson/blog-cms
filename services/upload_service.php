<?php

session_start();

require_once('blog_service.php');

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

//Check if user doesnt have a blog and are in the process of making one.
if (getUserBlog($_SESSION['userId']) == false) {
    /* Move image that is sent in through a form, to a specific permanently location on the server */
    if (file_exists($_FILES['blog-image']['tmp_name'])) {
        $tmp_file = $_FILES['blog-image']['tmp_name']; //Temp filename on server for sent in image through post request
        $upload_dir = "../uploads/"; //Directory on server that image is going to be stored in
        $target_file = basename($_FILES['blog-image']['name']); //Image name on the server when stored correctly
        //check if image upload went through
        if (move_uploaded_file($tmp_file, $upload_dir . $target_file)) {
            $message = "Filen har laddats upp.";
            echo json_encode($message);
        } else {
            //Something went wrong during the upload
            $error = $_FILES['blog-image']['error'];
            $message = $upload_errors[$error];
            echo json_encode($message);
        }
    } else {
        /* In case no file has been chosen to upload */
        $message = 'Valj en fil att ladda upp.';
        echo json_encode($message);
    }
} else {
    /* If user does have a blog */
    /* Move image that is sent in through a form, to a specific permanently location on the server */
    if (file_exists($_FILES['image']['tmp_name'])) {
        $tmp_file = $_FILES['image']['tmp_name']; //Temp filename on server for sent in image through post request
        $upload_dir = "../uploads/"; //Directory on server that image is going to be stored in
        $target_file = basename($_FILES['image']['name']); //Image name on the server when stored correctly 
        $filePath = $upload_dir . $target_file; //Filepath that image is going to get on the server
        $blogId = getUserBlog($_SESSION['userId'])['id']; //Get blogId to which blog the image is going to be uploaded to
        //check if image upload went through
        if (move_uploaded_file($tmp_file, $upload_dir . $target_file)) {
            $upload_dir_absolute = "/~frelab-8/Projekt_Blogg/uploads/"; //Directory on server that image is going to be stored in
            $imageFilePath = $upload_dir_absolute . $target_file;
            //Check if user sent in a description to the image
            if (!isset($_POST['alt_text'])) {
                $description = '';
            } else {
                $description = $_POST['alt_text'];
            }
            addNewImage($blogId, $imageFilePath, $description, $target_file);
            $message = "Filen har laddats upp.";
            echo json_encode($message);
        } else {
            //Something went wrong during the upload
            $error = $_FILES['image']['error'];
            $message = $upload_errors[$error];
            echo json_encode($message);
        }
    } else {
        /* In case no file has been chosen to upload */
        $message = 'Välj en fil att ladda upp.';
        echo $message;
    }
}
