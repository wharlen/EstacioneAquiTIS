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
<div id="main-wrapper">
   <div id="main">
    	<div id="main-inner">
    		<div class="container">
    		<div class="block-content block-content-small-padding">
    			<div class="block-content-inner">
     <?php
            $cod = $_GET['cod'];
             $cs = new Casa();
              //$dados = $ib->obterDadosSQL($ib->executarSQL($cs->buscar("",$cod)));
                $result = $ib->executarSQL($cs->buscar("",$cod));
                $nl = $ib->obterQtdeSQL($result);
                if($nl != 0){
                $casa = $ib->obterDadosSQL($result); ?>

                   
                <div class="well well-lg">
                      <div class="row">
                    <div class="col-sm-12">
                    <h2 class="center"><span class="glyphicon glyphicon-home"></span> Detalhes</h2>
                  </div>
                </div>
            <div class="row">
                <div class="col-md-5">
                    <input id="txtAddress" type="hidden" class="text" value="<?=$casa['cs_endereco']?>,<?=$casa['cs_bairro']?>,<?=$casa['cs_cidade']?>,<?=$casa['cs_estado']?>" />
                    <div id="map_canvas">
                    </div>
                  
               </div>
               <div class="col-md-7"> 
                      <h4>Casa na <?=$casa['cs_endereco']?>,<?=$casa['cs_bairro']?>,<?=$casa['cs_cidade']?>,<?=$casa['cs_estado']?></h4>
                      <p>CEP <?=$casa['cs_cep']?></p>
                      <p><img src="img/animal.png"><?php if($casa['cs_animal']=='S')echo "Presença de animais";else echo "Não há presença de animais";?></p>
                      <p><img src="img/seguro.png"><?php if($casa['cs_seguro']=='S')echo "Seguro residencial";else echo "Não há seguro residencial";?></p>
                      
                      <?php 
                
                    $vg = new Vaga();
                    $dado = array("vg_casa"=>$cod,
                                "vg_bloqueado"=>'N',
                                "vg_status"=>'A');
                    $result = $ib->executarSQL($vg->buscar("vg_codigo, vg_descricao, vg_valorinicial, vg_tipo, vg_tamanho, vg_situacao",$dado,"","vg_codigo"));

                   // echo "Query:".$vg->buscar("vg_descricao, vg_valorinicial, vg_tipo, vg_tamanho, vg_situacao",$dado,"");

                    $nl = $ib->obterQtdeSQL($result);
                   if($nl != 0){
                            $i=1;
                        while($vaga = $ib->obterDadosSQL($result)):
                            
                    ?>
                    <h2>Vagas Disponíveis</h2>
                      <div class="property-detail-overview">
                                        <div class="property-detail-overview-inner clearfix">
                                        	<h3>Vaga <?=$i;?></h3><p><?=$vaga['vg_descricao'];?></p>
                                            <div class="property-detail-overview-item col-sm-6 col-md-2">
                                                <strong>Valor Inicial:</strong>
                                                <span>R$ <?=$vaga['vg_valorinicial']?></span>
                                            </div><!-- /.property-detail-overview-item -->

                                            <div class="property-detail-overview-item col-sm-6 col-md-2">
                                                <strong>Tipo:</strong>
                                                <span><?php if($vaga['vg_tipo']=='C'){echo "Coberta";}else{echo "Descoberta";}?></span>
                                            </div><!-- /.property-detail-overview-item -->

                                            <div class="property-detail-overview-item col-sm-6 col-md-2">
                                                <strong>Tamanho:</strong>
                                                <span><?php if($vaga['vg_tamanho']=='M'){echo "Média";}else if($vaga['vg_tamanho']=='P'){echo "Pequena";}else if($vaga['vg_tamanho']=='G'){echo "Grande";}?></span>
                                            </div><!-- /.property-detail-overview-item -->
                                             <a href="cadastro.php?tipo=SV&vg=<?=$vaga['vg_codigo']?>" class="btn btn-info">Entrar</a>
                                        </div><!-- /.property-detail-overview-inner -->
                                    </div><!-- /.property-detail-overview -->

                        <?php $i++; endwhile;
                    }
                    else
                    {
                      echo "<h2>Não há vagas disponíveis nessa casa</h2>";
                    }
                      ?>
                </div>
            </div>                 
<?php }?>
          </div>  <!--FIM DO WELL ENGLOBANDO TODO CONTEUDO PRINCIPAL-->
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
