<!DOCTYPE html>
<?php 
    
   session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
            
            if(isset($_SESSION['login'])){
                header('location: principal.php');exit;
            }else{
                header ("location: login.php");exit;
            }
            
            
        ?>
    </body>
</html>
