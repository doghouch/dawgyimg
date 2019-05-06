<?php

require("../config.php");
error_reporting(0);
header("Content-Type: application/json");
session_start();

function fixRotation($img) { 
    $orientation = $img->getImageOrientation(); 
    switch ($orientation) { 
        case imagick::ORIENTATION_BOTTOMRIGHT: 
            $img->rotateimage("#000", 180);
            break; 
        case imagick::ORIENTATION_RIGHTTOP: 
            $img->rotateimage("#000", 90);
            break; 
        case imagick::ORIENTATION_LEFTBOTTOM: 
            $img->rotateimage("#000", -90);
            break; 
    } 
    $img->setImageOrientation(imagick::ORIENTATION_TOPLEFT); 
} 

if (empty($_POST["csrf"])) {
    // Check if CSRF token = empty
    $resp->status = "CSRF_EMPTY";
} else if (!hash_equals($_SESSION["csrf"], $_POST["csrf"])) {
    // Check if CSRF token = valid
    $resp->status = "CSRF_INVALID";
} else if (!in_array(strtolower(substr(strrchr($_FILES["file"]["name"], "."), 1)), $allowedExtensions)) {
    // Check if file extension = $allowedExtensions
    $resp->status = "DISALLOWED_EXT";
} else if (exif_imagetype($_FILES["file"]["tmp_name"]) == false) {
    // Check if image type = valid
    $resp->status = "INVALID_IMAGE";
} else if ($_FILES["file"]["size"] > $maxSizeInMb * 1000000) {
    // Image too large
    $resp->status = "IMAGE_SIZE";
} else {
    // All checks passed - strip exif data before moving image
    $resp->status = "SUCCESS";
    if (strtolower(substr(strrchr($_FILES["file"]["name"], "."), 1)) != "gif") {
        $i = new Imagick($_FILES["file"]["tmp_name"]);
        fixRotation($i);
        $profiles = $i->getImageProfiles("icc", true);
        $i->stripImage();
        if (!empty($profiles)) {
            $i->profileImage("icc", $profiles['icc']);
        }
        $i->writeImage($_FILES["file"]["tmp_name"]);
    }
    // Generate a random name -- try again if name already exists
    while (true) {
        $finalName = bin2hex(random_bytes(5)) . "." . strtolower(substr(strrchr($_FILES["file"]["name"], "."), 1));
        if (!file_exists("../i/" . $finalName)) break;
    }
    // Move image
    move_uploaded_file($_FILES["file"]["tmp_name"], "../i/" . $finalName);
    $resp->imageUrl = "i/" . $finalName;
}

// Convert name into HTML safe text
$resp->fileName = htmlspecialchars($_FILES["file"]["name"]);

// Return JSON response
echo json_encode($resp);

?>
