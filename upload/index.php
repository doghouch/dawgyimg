<?php
/*


      dP                                          oo                     
      88                                                                 
.d888b88 .d8888b. dP  dP  dP .d8888b. dP    dP    dP 88d8b.d8b. .d8888b. 
88'  `88 88'  `88 88  88  88 88'  `88 88    88    88 88'`88'`88 88'  `88 
88.  .88 88.  .88 88.88b.88' 88.  .88 88.  .88    88 88  88  88 88.  .88 
`88888P8 `88888P8 8888P Y8P  `8888P88 `8888P88    dP dP  dP  dP `8888P88 
                                  .88      .88                       .88 
                              d8888P   d8888P                    d8888P  


Thank you for the donation! :)

You can configure the simple image hosting script by modifying the variables below.

DO NOT MODIFY THE ACTUAL CODE IF YOU DON'T KNOW WHAT YOU'RE DOING!

This software is provided AS-IS and there are NO guarantees. However, if you should encounter
a bug or error, please contact me at "admin@dawgy.pw."

Please do not redistribute.

*/

session_start();
require ('../config.php');

$uploaddir = '../' . $image_directory . '';
$max_size = $image_size * 1000000;
$extension = pathinfo($_FILES['file']['name']);
$extension = $extension[extension];
$allowed_paths = explode(", ", $image_extensions);

for ($i = 0; $i < count($allowed_paths); $i++)
	{
	if ($allowed_paths[$i] == "$extension")
		{
		$ok = "1";
		}
	}

if ($ok == "1")
	{
	if ($_FILES['file']['size'] > $max_size)
		{
		echo 'Image(s) must be smaller than ' . $image_size . 'MB!';
		exit;
		}

	if (exif_imagetype($_FILES['file']['tmp_name']) == false)
		{
		die('One or more image(s) were invalid');
		}

	if (is_uploaded_file($_FILES['file']['tmp_name']))
		{
		$ext = pathinfo($_FILES['file']['name']);
		$ext = $ext['extension'];
		$ext = strtolower($ext);
		$random1 = substr(hash('sha1', time() . uniqid()) , -5);
		$random2 = substr(md5(time() . uniqid()) , -5);
		$random_filename = '' . $random1 . '' . $random2 . '';

		// $random_filename = uniqid(generateRandomString());

		if (file_exists('' . $random_filename . '.' . $ext . ''))
			{
			die('Server Error, please try again later');
			}

		move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . '/' . $random_filename . "." . $ext);
		}

	$finalizedUrl = '' . $uploaddir . '/' . $random_filename . $_FILES['name'] . '.' . $ext . '';
	$processedfilename = '' . $random_filename . '.' . $ext . '';
	$url = 'i/' . $processedfilename . '';
	echo '<a href="' . $url . '">' . $_FILES['file']['name'] . '</a><br />';
	exit;
	}
  else
	{
	echo 'Empty/invalid submission';
	exit;
	}

?>
