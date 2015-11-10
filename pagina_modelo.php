<?php
    
    require "includes/sessao.php";
    
    require "includes/database.php";
    require "includes/modelo.php";
    
    include "includes/funcoes.php";
    
    include "includes/configsys.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$titulosys?></title>
        <?php   
            include "includes/js-jquery.php"; 
            include "includes/css.php"; 
        ?>
        
    </head>
    <body>
        <div align="center">
            <?php
            
            include "includes/menu.php";
            
            ?>
            <div></div>
            <?php 
            $ib->fecharBanco();
            
            ?>
        </div>
    </body>
</html>