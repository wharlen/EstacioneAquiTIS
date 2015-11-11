<?php
    //incluindo arquivo de sessão
    require "includes/sessao.php";
    //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$titulosys?></title>
        <?php   
            include "includes/js-jquery.php"; 
            include "includes/css.php"; 
        ?>
    </head>
    <body>
        <div class="container">
            <?php include "includes/menu.php"?>
        <h3 class="titulo1">BEM VINDO <?=strtoupper($_SESSION['login'])?></h3>
        
        <p>Esta é a pagina principal.</p>
        
        
        
        
        
        <div class="container1">
            <?php  
            $sf = new Satisfacao();
            $nls = $ib->obterQtdeSQL($ib->executarSQL($sf->buscar('sf_codigo',"where sf_proprietario = '".$_SESSION['codigo_usuario']."' and "
                    . "(sf_nota = '4' or sf_nota = '5')","sql")));
            
            if($nls == 8){
            ?>
            <div style="width:50%;background-color: red">
                <p style="color:#eeeeee">ATENÇÃO!! Voce possui muitos votos de insatisfação</p>
            </div>
            <?php  } ?>
            <div class="fades" style="width:90%">
            <?php 
                    $titles1 = "";
                    $titles2 = "Você possui novas solicitações";
                    $linkvoltar = "";
                    include "includes/lista_solicitacao.php";?>
            </div>
        </div> <br><br>
        
        <div class="container1">
            <h3>Você quer localizar uma vaga de estacionamento? </h3>
                <p>	<small>Veio ao lugar certo! Veja qual a opção abaixo 
                        é melhor para você.</small></p>

                <div>
                    <input type="checkbox" name="localizacao"> Marque aqui para buscar uma vaga mais proxima apartir da sua localização.

                    <h4 class="text-heroi"><strong>OU</strong></h4>

                    <p>Digite abaixo o endereço desejado ou deixe em branco para buscar todas as vagas</p>

                    <div class="text-center	 divbusca">
                        <form role="form" method="post" action="procurar_vaga.php">

                            <input type="text" name="research" class="form-contro" id="endereco" placeholder="Rua, nº, Bairro ou Cidade">
                            <button class="botao01" type="submit">Buscar</button>
                        </form>
                    </div>
                </div> 
        </div>
        <?php $ib->fecharBanco(); ?>
        </div>
    </body>
</html>