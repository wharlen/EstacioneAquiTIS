 <?php 
    require "includes/sessao.php";
     //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";?>

<?php include"includes/header_site.php";?>
<?php include "includes/maps-ver.php";?>
<?php include "includes/cabec_site.php";?>
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
	</div>
</div>
</body>
</html>
