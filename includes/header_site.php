<?php
     //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title></title>
    <link rel="stylesheet" type="text/css" href="css/site/font-awesome.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="css/site/jquery-bxslider/jquery.bxslider.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="css/site/flexslider/flexslider.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="css/site/realocation.css" media="screen, projection" id="css-main">
        <link rel="stylesheet" type="text/css" href="css/site/blue.css" media="screen, projection" id="css-main">
 <?php   

        ?>
    </head>

<body>

<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
    <div id="header-inner">

        <div class="header-top">
            <div class="container">
                <div class="header-identity">
                    <a href="index.html" class="header-identity-target">
                        <img src="img/map_icon.png">
                        <span class="header-slogan">Garagem Compartilhada<br>Economia Compartilhada</span><!-- /.header-slogan -->
                    </a><!-- /.header-identity-target-->
                </div><!-- /.header-identity -->
 <?php if(!isset($_SESSION['codigo_usuario'])): ?>
                <div class="header-actions pull-right">
                    <a href="cadastro.php?tipo=US" class="btn btn-regular">Criar conta</a> <strong class="separator">ou</strong> <a href="login.php" class="btn btn-primary"><i class="fa fa-plus"></i>Faça Login</a>
                </div><!-- /.header-actions -->
<?php endif; ?>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".header-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div><!-- /.container -->
        </div><!-- .header-top -->

       <?php include"includes/menu_site.php";?>
    </div><!-- /.header-inner -->
</div><!-- /#header -->    </div><!-- /#header-wrapper -->