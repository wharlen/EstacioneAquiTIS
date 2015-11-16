    <?php 
 if(isset($_GET['login']))
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

                   <div class="row">
                    <h2>Detalhes</h2>
                </div>
            <div class="row">
                <div class="col-md-5">
                    <input id="txtAddress" type="hidden" class="text" value="<?=$casa['cs_endereco']?>,<?=$casa['cs_bairro']?>,<?=$casa['cs_cidade']?>,<?=$casa['cs_estado']?>" />
                    <div id="map_canvas">
                    </div>
               </div>
               <div class="col-md-7"> 
                  <p>Casa na <?=$casa['cs_endereco']?>,<?=$casa['cs_bairro']?>,<?=$casa['cs_cidade']?>,<?=$casa['cs_estado']?></p>
                  <p>CEP <?=$casa['cs_cep']?></p>
                  <p><img src="img/animal.png"><?php if($casa['cs_animal']=='S')echo "Presença de animais";else echo "Não há presença de animais";?></p>
                  <p><img src="img/seguro.png"><?php if($casa['cs_seguro']=='S')echo "Seguro residencial";else echo "Não há seguro residencial";?></p>
                  <h2>Vagas Disponíveis</h2>
                  <div class="property-detail-overview">
                                    <div class="property-detail-overview-inner clearfix">
                                    	<h3>Vaga 1</h3><p>Aqui estara a descrição da primeira vaga</p>
                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Valor Inicial:</strong>
                                            <span>R$ 15.00</span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Tipo:</strong>
                                            <span>Coberta</span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Tamanho:</strong>
                                            <span>Grande</span>
                                        </div><!-- /.property-detail-overview-item -->
                                    </div><!-- /.property-detail-overview-inner -->
                                </div><!-- /.property-detail-overview -->
                  <div class="property-detail-overview">
                                    <div class="property-detail-overview-inner clearfix">
                                    	<h3>Vaga 2</h3>
                                    	<p>Aqui estara a descrição da segunda vaga</p>
                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Valor Inicial:</strong>
                                            <span>R$ 15.00</span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Tipo:</strong>
                                            <span>Coberta</span>
                                        </div><!-- /.property-detail-overview-item -->

                                        <div class="property-detail-overview-item col-sm-6 col-md-2">
                                            <strong>Tamanho:</strong>
                                            <span>Grande</span>
                                        </div><!-- /.property-detail-overview-item -->
                                    </div><!-- /.property-detail-overview-inner -->
                                </div><!-- /.property-detail-overview -->
                </div>

            </div>
                  
<?php }?>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
