<?php

    $target_dir = "./uploads/";        // Didnt want to upload every image to repo. Might be a wrong move?
    $target_file =  basename($_FILES["fileToUpload"]["name"]);

    $target_file = preg_replace('/[^a-zA-Z0-9\.]/', '_', $target_file);
    // Turn every non alphanumeric character
    // To _s so that file names are safe.
    // Doesn't matter since user won't see the name
    // of the files

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_dir . $target_file,PATHINFO_EXTENSION));         // holds the file extension of the file
    
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 2000000) {         // 2 mb
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
        echo "Sorry, your file was not uploaded.<br>";
        exit();
    } 
    
    if (file_exists($target_dir . $target_file)) {
        for (; file_exists($target_dir . $target_file); $target_file = rand().$target_file);
    } 

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    } 
    else {
        $uploadOk = 0;
        echo "Sorry, your file was not uploaded.<br>";
        exit();
    }

    if (strlen($target_file) >= 200) {
        echo "Name of the image should be below 200 chars<br>";
        $uploadOk = 0;
        echo "Sorry, your file was not uploaded.<br>";
        exit();
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
        $uploadOk = 0;
        echo "Sorry, your file was not uploaded.<br>";
        exit();
    }

    $target_file = $target_dir . $target_file;
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
        } 
        else {
            echo "Sorry, there was an error uploading your file.<br>";
            exit();
        }
    }

?>
