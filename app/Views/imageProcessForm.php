<?php

$msg = "";
$css_class = "";

define ('img_upload_dir', realpath(dirname('user_images')));

$conn = mysqli_connect('localhost', 'root', '', 'book_exchanger');

if(isset($_POST['save-image'])){
    echo "<pre>", print_r($_FILES['image']['name']), "</pre>";

    $imageName = time() . '_' . $_FILES['image']['name'];

    $target =  img_upload_dir . '\uploads\user_images\\' . $imageName;

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $sql = "INSERT INTO tbl_image (image_name) VALUES ('$imageName')";
        if(mysqli_query($conn, $sql)){
            $msg = "Image uploaded and saved to the database";
            $css_class = "alert-success";
        }
        else{
            $msg = "Database Error: Failed to save image";
            $css_class = "alert-danger";
        }
    }
    else{
        $msg = "Failed to upload the image";
        $css_class = "alert-danger";
    }
}