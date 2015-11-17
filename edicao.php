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

        <?php
        include "includes/header_site.php";
        //Incluindo arquivos para leitura de javascrript e CSS
            include "includes/js-jquery.php"; 
            include "includes/css.php"; 
        ?>
        <script type="text/javascript">

           //Inserindo mascara para os campos
           $(document).ready(function(){
               $("#cep").mask("99999-999");
               $("#nascimento, #datai, #dataf").mask("99/99/9999");
               $("#horai, #horaf").mask("99:99");
               $("#telefone").mask("(99) 9999-9999");
               $("#ano").mask("9999");
               $("#placa").mask("aaa-9999");
            });
            
        </script>
            <style type="text/css">
        html,body { height: 100%; margin: 0px; padding: 0px; }
        #map_canvas {
            width:100%;
            height:400px;
        }
        
        .text 
        {
            border:1px solid black;
            width:300px;
        }
        label 
        {
            width:100px;
        }
    </style>
        <?php include"includes/cabec_site.php";?>
<div id="main-wrapper">
   <div id="main">
        <div id="main-inner">
            <div class="container">
                <div class="block-content block-content-small-padding">
                <div class="block-content-inner">
            <?php

            if(isset($_GET)){
             
            $botaovoltar =  input_form("button", "","","Voltar",array("onclick"=>"window.location.href='index.php'",
                "class" => "botao01","style" => "margin:auto"));  
            
            //Editando dados do Usuario
            if($_GET['tipo'] == "US"){
                $us = new Usuario();
                
                $dados = $ib->obterDadosSQL($ib->executarSQL($us->buscar("",$_GET['cod'])));
                
                
            ?>
            <h3>Configurar Usuario - Login: <?=$dados['us_login']?></h3>
            <div class="box">
              <div class="row">  
            <div class="col-sm-6">  
            <div class="row">
            <?= abrir_form("post", "usuario", "atualizar.php?tipo=US", "return validaUsuario(this,'E');")?>
            <div class="form-group">
                <label>Nome:*</label>
              
                    <?= input_form("", "nome","",$dados['us_nome'],"size='30' class='form-control'")?>
                
            </div>
            <div class="form-group">
                <label>Sexo</label>
                
                    <?= input_form("radio", "sexo","","M", ($dados['us_sexo'] == 'M'?"checked":""))?>Masculino&nbsp;
                    <?= input_form("radio", "sexo","","F", ($dados['us_sexo'] == 'F'?"checked":""))?>Feminino
                
            </div>
            <div class="form-group">
                 <label>Data Nascimento:*</label>
              
                    <?= input_form("", "nascimento","nascimento",formatar_data_barras($dados['us_datanascimento'],"dd/mm/yyyy"),"size='9' class='form-control'")?>
               
            </div>
                <div class="form-group"><label>Telefone(DDD sem 0):</label>
                 <?= input_form("", "telefone","telefone",$dados['us_telefone'],"size='12' class='form-control'")?>
            </div>
                <div class="form-group">
                 <label>RG:</label>
                    <?= input_form("", "rg","",$dados['us_rg'],"size='13' class='form-control'")?>
            </div>
                <div class="form-group"><label><small>(<b>*</b>) Campos Obrigatórios</small></label>
                </div>
                <div class="form-group">
                    <?= input_form("submit", "","","Atualizar",array("class" => "btn btn-info","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?>
            </div>
            
            <?= fecha_form() ?>
                </div>
                </div>
            </div>
        </div>
            <?php 
            
            //Editando dados do veiculo
            } elseif($_GET['tipo'] == "VC"){ 
                $vc = new Veiculo();
                
                $dados = $ib->obterDadosSQL($ib->executarSQL($vc->buscar("",$_GET['cod'])));
                
                
                ?>
                <h3 class="titulo1">Editar Veiculo <?=$dados['vc_marca']." - ".$dados['vc_modelo']?></h3>
            <div class="container1">    
                <?= abrir_form("post", "veiculo", "atualizar.php?tipo=VC", "return validaVeiculo(this, 'E');")?>
                <table>
                    <tr><td>Marca:*</td><td><?= input_form("", "marca","",$dados['vc_marca'],"size='18' ")?></td></tr>
                    <tr><td>Modelo:*</td><td><?= input_form("", "modelo","",$dados['vc_modelo'],"size='23'")?></td></tr>
                    <tr><td>Cor:*</td><td><?= input_form("", "cor","",$dados['vc_cor'],"size='12'")?></td></tr>
                    <tr><td>Ano:*</td><td><?= input_form("", "ano","ano",$dados['vc_ano'],"size='3'")?></td></tr>
                    <tr><td>Carroceria(Tamanho):</td><td>
                    <?= input_form("radio", "carroceria","","P", ($dados['vc_carroceria'] == 'P'?"checked":""))?>Pequeno&nbsp;
                    <?= input_form("radio", "carroceria","","M", ($dados['vc_carroceria'] == 'M'?"checked":""))?>Médio&nbsp;
                    <?= input_form("radio", "carroceria","","G", ($dados['vc_carroceria'] == 'G'?"checked":""))?>Grande</td></tr>
                    <tr><td>&nbsp;<?= input_form("hidden", "codigo","",$dados['vc_codigo'])?></td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Atualizar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
                <?= fecha_form() ?>
            </div>
                <?php 
                
                //Editando dados da Casa
            }elseif($_GET['tipo'] == "CS"){ 
                    $cs = new Casa();
                
                    $dados = $ib->obterDadosSQL($ib->executarSQL($cs->buscar("",$_GET['cod'])));
                    ?>
                <h2>Editar dados da Casa:</h2>
            <div class="box">
        <div class="row">
            <div class="col-sm-6">    
                <?= abrir_form("post", "casa", "atualizar.php?tipo=CS", "return validaCasa(this, 'E');")?>
                <div class="form-group">
                    <label>CEP:*</label><?= input_form("", "cep","cep",$dados['cs_cep'],"size='12' onblur='javascript: pesquisacep(this.value);'")?></div>
                    <div class="form-group">
                    <label>Rua/Avenida:*</label><?= input_form("", "endereco","endereco",$dados['cs_endereco'],"size='26'")?>&nbsp;&nbsp;&nbsp;Nº:*&nbsp;<?= input_form("", "numero","",$dados['cs_numero'],"size='5' onkeyup='mascara(this,\"9999\");' onkeypress='mascara(this,\"9999\");' ")?></div>
                    <div class="form-group">
                    <label>Bairro:*</label><?= input_form("", "bairro","bairro",$dados['cs_bairro'],"size='16'")?></div>
                    <div class="form-group">
                    <label>Cidade:*</label><?= input_form("", "cidade","cidade",$dados['cs_cidade'],"size='16'")?></div>
                    <div class="form-group">
                    <label>Estado (UF):*</label><?= input_form("", "estado","estado",$dados['cs_estado'],"size='5' onkeyup='mascara(this,\"LL\");' onkeypress='mascara(this,\"LL\");' ")?></div>
                    <div class="form-group">
                    <label>Possui Seguro ?</label>
                    <?= input_form("radio", "seguro","","S", ($dados['cs_seguro'] == 'S'?"checked":""))?>Sim&nbsp;
                    <?= input_form("radio", "seguro","","N", ($dados['cs_seguro'] == 'N'?"checked":""))?>Não</div>
                     <div class="form-group"><label>Há presença de Animal na casa ?</label>
                    <?= input_form("radio", "animal","","S", ($dados['cs_animal'] == 'S'?"checked":""))?>Sim&nbsp;
                    <?= input_form("radio", "animal","","N", ($dados['cs_animal'] == 'N'?"checked":""))?>Não</div>
                     <div class="form-group">&nbsp;<?= input_form("hidden", "codigo","",$dados['cs_codigo'])?>
                    <label><small>(<b>*</b>) Campos Obrigatórios</small></label></div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Procurar no mapa: </label>
                    <?= input_form("", "latitude","latitude",$dados['cs_latitude'],"size='20' class=\"lat\"")?>
                    <?= input_form("", "longitude","longitude",$dados['cs_longitude'],"size='20'")?>
                    
                    <input id="txtAddress" type="text" class="text" value=""/> <input type="button" id="btnGo" value="Procurar" />
                
                </div>
                <div class="form-group">
                 <div id="map_canvas" width="100%" height="250px">
                    </div>
                     <?php require"includes/maps_edicao.php";?>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0X4v7eqMFcWCR-VZAJwEMfb47id9IZao&signed_in=true&callback=initMap"
        async defer></script>
                </div>
            </div>
        </div>
        <div class="row">
                 <div class="form-group">
                    <tr><td colspan="2"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </div>
            </div>
                <?= fecha_form() ?>
            </div>
                <?php 
                
                //Edditando dados da Vaga
            }elseif($_GET['tipo'] == "VG"){ 
                    $vg = new Vaga();
                
                    $dados = $ib->obterDadosSQL($ib->executarSQL($vg->buscar("",$_GET['cod'],"","","casa")));
                    ?>
                <h3 class="titulo1">Editar <?=$dados['vg_descricao']?> da casa: <?=$dados['cs_endereco']." - ".$dados['cs_numero']?></h3>
            <div class="container1">    
                <?= abrir_form("post", "vaga", "atualizar.php?tipo=VG", "return validaVaga(this, 'E');")?>
                
                <table id="inserirvaga" >
                    <tr><td>Descrição da vaga:</td><td><?= input_form("", "descricao","",$dados['vg_descricao'])?></td></tr>
                    <tr><td>Tipo:*</td><td>
                    <?= input_form("radio", "tipo","","C", ($dados['vg_tipo'] == 'C'?"checked":""))?>Com Cobertura&nbsp;
                    <?= input_form("radio", "tipo","","S", ($dados['vg_tipo'] == 'S'?"checked":""))?>Sem Cobertura</td></tr>
                    <tr><td>Tamanho:*</td><td>
                    <?= input_form("radio", "tamanho","","P", ($dados['vg_tamanho'] == 'P'?"checked":""))?>Pequeno&nbsp;
                    <?= input_form("radio", "tamanho","","M", ($dados['vg_tamanho'] == 'M'?"checked":""))?>Medio&nbsp;
                    <?= input_form("radio", "tamanho","","G", ($dados['vg_tamanho'] == 'G'?"checked":""))?>Grande</td></tr>
                    <tr><td>Valor Inicial(por 15 minutos):</td><td><?= input_form("", "valor", "", $dados['vg_valorinicial'])?></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;<?= input_form("hidden", "codigo","",$dados['vg_codigo'])?></td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
                <?= fecha_form() ?>
            </div>
                <?php }
            
            }
            $ib->fecharBanco();
            ?>
            
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