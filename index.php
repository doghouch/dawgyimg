<?php require('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title><?php print($site_title); ?></title>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <link href="//cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js" type="text/javascript"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300' rel='stylesheet' type='text/css'>
      <link href="//fonts.googleapis.com/css?family=Josefin+Slab:300" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" type="text/javascript"></script>
      <link href="<?php print($site_assets); ?>assets/main.css" rel="stylesheet" type="text/css">
      <script src="<?php print($site_assets); ?>assets/site.js"></script>
      <script src="<?php print($site_assets); ?>assets/read.js"></script>
      <script src="<?php print($site_assets); ?>assets/new.js"></script>
      <link href="<?php print($site_assets); ?>assets/code.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div id="links" style="display: none;"></div>
      <h1 style="text-align: center; font-family: 'Josefin Slab', sans-serif; color: white;"><?php print($site_inner_title); ?> <small><b style="color: white;">Image Hosting</b></small></h1>
      <h4 style="color: white; text-align: center; font-family: 'Josefin Slab', sans-serif;"><span id="photos">0</span> photo(s) stored</h4>
      <div class="sp"></div>
      <div class="container">
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 dropzone uploadimage-dragndrop" id="dropzone">
               <div class="dropzone-previews" id="previews"></div>
            </div>
            <div class="col-md-3"></div>
         </div>
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 uploadimage-dragndrop" style="border-radius: 0px; border-bottom-right-radius: 25px; border-bottom-left-radius: 25px; background-color: lightgrey; margin-bottom: 0px; margin-top: 0px;">
               <div class="jumbotron" style="margin-top: 0px; margin-bottom: 0px;">
                  <h1>[ad]</h1>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>