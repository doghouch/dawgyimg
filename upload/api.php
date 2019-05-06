<?php

error_reporting(0);
header("Content-Type: application/json");

// Count images
$resp->status = "SUCCESS";
$resp->numberOfImages = count(glob("../i/*.jpg")) + count(glob("../i/*.jpeg")) + count(glob("../i/*.png")) + count(glob("../i/*.tif")) + count(glob("../i/*.tiff")) + count(glob("../i/*.gif"));

// Return JSON response
echo json_encode($resp);

?>