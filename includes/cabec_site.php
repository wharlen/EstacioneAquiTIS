 </head>

<body>

<div id="wrapper">
    <div id="header-wrapper">
        <div id="header">
    <div id="header-inner">

        <div class="header-top">
            <div class="container">
                <div class="header-identity">
                    <a href="principal.php" class="header-identity-target">
                        <img src="img/map_icon.png">
                        <span class="header-slogan">Garagem Compartilhada<br>Economia Compartilhada</span><!-- /.header-slogan -->
                    </a><!-- /.header-identity-target-->
                </div><!-- /.header-identity -->
 <?php if(!isset($_SESSION['login'])): ?>
                <div class="header-actions pull-right">
                    <a href="cadastro.php?tipo=US" class="btn btn-regular">Criar conta</a> <strong class="separator">ou</strong> <a href="login.php" class="btn btn-primary"><i class="fa fa-plus"></i>Faça Login</a>
                </div><!-- /.header-actions -->
<?php endif; ?>
            <?php 
            if(isset($_SESSION['login'])){ 
            $sf = new Satisfacao();
            $nls = $ib->obterQtdeSQL($ib->executarSQL($sf->buscar('sf_codigo',"where sf_proprietario = '".$_SESSION['codigo_usuario']."' and "
                    . "(sf_nota = '4' or sf_nota = '5')","sql")));
            
            if($nls == 8){
            ?>
                <div class="alert alert-danger fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>ATENÇÃO!</strong> Voce possui muitos votos de insatisfação
                </div>
            <?php }} ?>
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