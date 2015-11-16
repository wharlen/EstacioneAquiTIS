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


    include"includes/header_site.php";
    //Incluindo arquivos para leitura de javascript e CSS
    include "includes/js-jquery.php"; 
    include "includes/css.php";  
    include "includes/maps-ver.php";
    include"includes/cabec_site.php";
    ?>

<div id="main-wrapper">
   <div id="main">
        <div id="main-inner">
            <div class="container">
                <h3>Endereço no mapa </h3>
                <div class="box">   
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
                    
                    <input id="txtAddress" type="hidden" class="text" value="<?=$casa['cs_endereco']?>,<?=$casa['cs_bairro']?>,<?=$casa['cs_cidade']?>,<?=$casa['cs_estado']?>" />
                        </div>
                        <div id="map_canvas">
                        </div>
                 
                    </td></tr>
</table>
<?php }?>           </div>
                 </div>
             </div>
        </div>
    </div>
</body>
    </html>