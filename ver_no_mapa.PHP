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
        <title><?=$titulosys?></title>
        <?php
        //Incluindo arquivos para leitura de javascript e CSS
            include "includes/js-jquery.php"; 
            include "includes/css.php";  
            include "includes/maps-ver.php";
        ?>
        
    </head>
    <body>
        <div class="container">
            <?php
            $cod = $_GET['cod'];
             $cs = new Casa();
              //$dados = $ib->obterDadosSQL($ib->executarSQL($cs->buscar("",$cod)));
                $result = $ib->executarSQL($cs->buscar("",$cod));
                $nl = $ib->obterQtdeSQL($result);
                if($nl != 0){
                $casa = $ib->obterDadosSQL($result); ?>
<table><tr><td colspan="5">
                        <div>
                    <label>Endereço no mapa : </label>
                    <input id="txtAddress" type="hidden" class="text" value="<?=$casa['cs_endereco']?>,<?=$casa['cs_bairro']?>,<?=$casa['cs_cidade']?>,<?=$casa['cs_estado']?>" />
                        </div>
                        <div id="map_canvas">
                        </div>
                        <!--main-->
                        <div id="map_cord"></div>
                    </td></tr>
</table>
<?php }?>
</div>
</body>
    </html>