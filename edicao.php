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
    </head>
    <body>
        <div align="center">
            <?php
            
            include "includes/menu.php";
            
            
            if(isset($_GET)){
             
            $botaovoltar =  input_form("button", "","","Voltar",array("onclick"=>"window.location.href='index.php'",
                "class" => "botao01","style" => "margin:auto"));  
            
            //Editando dados do Usuario
            if($_GET['tipo'] == "US"){
                $us = new Usuario();
                
                $dados = $ib->obterDadosSQL($ib->executarSQL($us->buscar("",$_GET['cod'])));
                
                
            ?>
            <h3 class="titulo1">Configurar Usuario - Login: <?=$dados['us_login']?></h3>
            <div class="container1">    
                <?= abrir_form("post", "usuario", "atualizar.php?tipo=US", "return validaUsuario(this,'E');")?>
                <table>
                    <tr><td>Nome:*</td><td><?= input_form("", "nome","",$dados['us_nome'],"size='30'")?></td></tr>
                    <tr><td>Sexo</td><td>
                    <?= input_form("radio", "sexo","","M", ($dados['us_sexo'] == 'M'?"checked":""))?>Masculino&nbsp;
                    <?= input_form("radio", "sexo","","F", ($dados['us_sexo'] == 'F'?"checked":""))?>Feminino</td></tr>
                    <tr><td>Data Nascimento:*</td><td><?= input_form("", "nascimento","nascimento",formatar_data_barras($dados['us_datanascimento'],"dd/mm/yyyy"),"size='9'")?></td></tr>
                    <tr><td>Telefone(DDD sem 0):</td><td><?= input_form("", "telefone","telefone",$dados['us_telefone'],"size='12'")?></td></tr>
                    <tr><td>RG:</td><td><?= input_form("", "rg","",$dados['us_rg'],"size='12'")?></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Atualizar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
                <?= fecha_form() ?>
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
                <h3 class="titulo1">Editar dados da Casa:</h3>
            <div class="container1">    
                <?= abrir_form("post", "casa", "atualizar.php?tipo=CS", "return validaCasa(this, 'E');")?>
                <table>
                    <tr><td>CEP:*</td><td><?= input_form("", "cep","cep",$dados['cs_cep'],"size='12' onblur='javascript: pesquisacep(this.value);'")?></td></tr>
                    <tr><td>Rua/Avenida:*</td><td><?= input_form("", "endereco","endereco",$dados['cs_endereco'],"size='26'")?>&nbsp;&nbsp;&nbsp;Nº:*&nbsp;<?= input_form("", "numero","",$dados['cs_numero'],"size='5' onkeyup='mascara(this,\"9999\");' onkeypress='mascara(this,\"9999\");' ")?></td></tr>
                    <tr><td>Bairro:*</td><td><?= input_form("", "bairro","bairro",$dados['cs_bairro'],"size='16'")?></td></tr>
                    <tr><td>Cidade:*</td><td><?= input_form("", "cidade","cidade",$dados['cs_cidade'],"size='16'")?></td></tr>
                    <tr><td>Estado (UF):*</td><td><?= input_form("", "estado","estado",$dados['cs_estado'],"size='5' onkeyup='mascara(this,\"LL\");' onkeypress='mascara(this,\"LL\");' ")?></td></tr>
                    <tr><td>Possui Seguro ?</td><td>
                    <?= input_form("radio", "seguro","","S", ($dados['cs_seguro'] == 'S'?"checked":""))?>Sim&nbsp;
                    <?= input_form("radio", "seguro","","N", ($dados['cs_seguro'] == 'N'?"checked":""))?>Não</td></tr>
                    <tr><td>Há presença de Animal na casa ?</td><td>
                    <?= input_form("radio", "animal","","S", ($dados['cs_animal'] == 'S'?"checked":""))?>Sim&nbsp;
                    <?= input_form("radio", "animal","","N", ($dados['cs_animal'] == 'N'?"checked":""))?>Não</td></tr>
                    <tr><td>&nbsp;<?= input_form("hidden", "codigo","",$dados['cs_codigo'])?></td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
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
    </body>
</html>