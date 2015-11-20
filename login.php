<?php
    //incluindo arquivo de sessão
    //require "includes/sessao.php";
    //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";
?>
<?php
session_start();
if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
    header('location:principal.php');
    exit;
}

?>
<?php include"includes/header_site.php";
    include"includes/cabec_site.php";?>

 <div id="main-wrapper">
        <div id="main">
            <div id="main-inner">
                <div class="container">
                    <div class="block-content block-content-small-padding">
                        <div class="block-content-inner">
                            <div class="row">
                                <div class="col-sm-4">
                                     <h2 class="center"><a href="cadastro.php?tipo=US">Cadastre-se</a></h2>
                                     <h3 class="center">ou</h3>
                                    <h2 class="center">Entre aqui</h2>

                                    <div class="box">
                                        <form method="post" action="criar_sessao.php" name="formlogin" onsubmit="return validaLogSenha(this);">
                                            <div class="form-group">
                                                <label>Login</label>
                                                <input type="usr" name="login" class="form-control">
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" name="senha" onkeypress="capLock(event);">
                                            </div><!-- /.form-group -->
                                        <div id="capsLK" style="visibility:hidden"><span style="color: green">Caps Lock está ativado.</span></div>
                                            <div class="form-group">
                                                <input type="submit" value="Login" class="btn btn-primary btn-inversed btn-block">
                                            </div><!-- /.form-group -->
                                        </form>
                                    </div><!-- /.box -->

                                </div>
                                 <div class="col-sm-8">
                            <div id="mapa" style="width:100%; height:400px!important"></div><!-- /#map -->
                            <script src="js/mapa/jquery.min.js"></script>
                             <script src="js/mapa/jquery.js"></script>
                            <script  src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao"></script>
                            <script src="js/mapa/infobox.js"></script>
                            <script src="js/mapa/markerclusterer.js"></script>
                            <script src="js/mapa/mapa.js"></script>
                                 </div>
                            </div><!-- /.row -->

                        </div><!-- /.block-content-inner -->
                    </div><!-- /.block-content -->
                </div><!-- /.container -->
            </div><!-- /#main-inner -->
        </div><!-- /#main -->
    </div><!-- /#main-wrapper -->

    </body>
</html>
