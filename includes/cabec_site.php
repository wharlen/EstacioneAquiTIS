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
            //mOSTRAR ALERTA DE NIVEIS DE SATISFACAO
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
            <div class="header-actions pull-right">
                   <h3><?php if(isset($_SESSION['login'])){echo "Olá ".$_SESSION['login'];} ?></h3>
            </div>

            <?php 
            //MOSTRAR QTD DE SOLICITAÇÕES PENDENTES

          /*  if(isset($_SESSION['login'])){ 
            $sv = new Servico();
            $nsp = $ib->obterQtdeSQL($sv->buscar("sv_codigo, sv_datainicial, sv_veiculo, sv_vaga, vg_descricao, vc_marca, vc_modelo, c.us_nome, c.us_telefone, cs_endereco, cs_numero ", array("sv_situacao" => "P", "cs_usuario" => $_SESSION['codigo_usuario']), "!E", "sv_datainicial", array("veiculo", "vaga", "casa", "usuario c")));
            
            if($nsp!=""){
            ?>
                <div class="alert alert-default fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   Voce possui <strong><?=$nsp;?></strong> pedente(s)
                </div>
            <?php }} */?>
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