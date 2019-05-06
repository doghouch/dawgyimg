<?php

// CSRF
session_start();
require("config.php");

if (empty($_SESSION["csrf"])) {
    $_SESSION["csrf"] = bin2hex(random_bytes(32));
}

$csrf = $_SESSION["csrf"];
   
?>

<!DOCTYPE html>
<html>
   <head>
      <title><?php print($title); ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
      <link rel="stylesheet" href="https://cdn.dawgy.pw/dawgy-img.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dragscroll/0.0.8/dragscroll.min.js"></script>
      <script src="https://cdn.dawgy.pw/FileReader.js"></script>
      <script src="https://cdn.dawgy.pw/dawgy-img.min.js"></script>
      <script type="text/javascript">
         let csrfToken = "<?php print($csrf); ?>";
      </script>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
               <img class="img-fluid introImg" src="https://cdn.dawgy.pw/dawgyimglogo.png" alt="logo">
               <div class="spacer-10"></div>
               <div class="uploadArea">
                  <form class="headerArea clickableArea" id="dropzone">
                     <h1 class="is-size-5 clickableArea">Drop, click, or paste to upload</h1>
                     <div class="spacer-10 clickableArea"></div>
                     <p class="is-size-7 clickableArea">Supported formats: <span style="font-style: italic"><?php print(implode(", ", $allowedExtensions)); ?></span></p>
                  </form>
                  <div class="loadingArea">
                     <div class="loadingBar"></div>
                  </div>
                  <div class="linkArea">
                     <div class="parentScroll dragscroll">
                        <p class="is-size-7 linkContainer">&nbsp;&nbsp;<span class="hint">Your images (drag to scroll): </span> <span class="imageLinks"></span>&nbsp;</p>
                     </div>
                  </div>
                  <div class="footerArea">
                     <input type="hidden" name="counter" value="0">
                     <p class="is-size-7"><span class="numberOfImages">0</span> image(s) uploaded. CDN accelerated by:</p>
                     <div class="spacer-10"></div>
                     <a href="https://bunnycdn.com" target="_blank"><img src="https://cdn.dawgy.pw/bunnycdn-logo.svg" alt="BCDN"></a>
                  </div>
               </div>
            </div>
            <div class="col-sm-3"></div>
         </div>
      </div>
   </body>
</html>