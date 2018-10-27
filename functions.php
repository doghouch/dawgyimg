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

This software is provided AS-IS and there are NO guarantees. If you should encounter
a bug or error, please contact me at "admin@dawgy.pw."

Please do not redistribute.

*/

require('config.php');

if($_GET['a'] === 'count') {
      $files = glob($image_directory. '/*');
      if ( $files !== false ) {
          $filecount = count( $files );
          echo $filecount - 1;
      } else {
          echo 0;
      }
}

?>
