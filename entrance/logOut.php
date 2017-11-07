<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

echo "<meta http-equiv=\"refresh\"content=\"2;URL=login.php\">";
?>
<html>
    <head>
        <link href="../assets/css/web-interface.css" rel="stylesheet">
    </head>
    
    <body>
        <div class="overlay">
            <div class="overlay-text">
                  <div class="loader"></div>
            </div>
        </div>
        
        <?php require './library/footer.php';?>
        
        <script>
            $(function(){
               $('.overlay').show(); 
            });
        </script>
    </body>
    
</html>

