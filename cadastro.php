<?php
   if(isset($_GET["tipo"])){
        if($_GET['tipo'] != "US"){
            require "includes/sessao.php";
            
        }
    }else{
        header("location: index.php");exit;
    }
     //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";

   include"includes/header_site.php";

        //Incluindo arquivos para leitura de javascrript e CSS
            include "includes/js-jquery.php"; 
            include "includes/css.php"; 
            if($_GET['tipo']=='CS')
            {
        ?>
        <script type="text/javascript">
               $("#botaoscasa").click(function(){
                   if($("#casadavaga").val() != ""){
                       $("#inserirvaga").show();
                       $("#campocasa").val($("#casadavaga").val());
                       $("#casadavaga").attr('disabled', 'true');
                       $("#botaoscasa").attr('disabled', 'true');
                   }
               });
               
               //Adicionando mascaras para os campos
               $("#cpf").mask("999.999.999-99");
               $("#cep").mask("99999-999");
               $("#nascimento, #datai, #dataf").mask("99/99/9999");
               $("#horai, #horaf").mask("99:99");
               $("#telefone").mask("(99) 9999-9999");
               $("#ano").mask("9999");
               $("#placa").mask("aaa-9999");      
        </script>
        <?php } require"includes/maps_cadastro.php";
           include"includes/cabec_site.php";?>
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
            
            //Cadastro de Usuario
            if($_GET['tipo'] == "US"){
            ?>
            <h3 class="titulo1">Cadastre-se</h3>
            <div class="container1">    
                <?= abrir_form("post", "usuario", "salvar.php?tipo=US", "return validaUsuario(this,'C');")?>
                <table>
                    <tr><td>Nome:*</td><td><?= input_form("", "nome","","","size='30'")?></td></tr>
                    <tr><td>CPF:*</td><td><?= input_form("", "cpf","cpf","","size='12'")?></td></tr>
                    <tr><td>Sexo</td><td>
                    <?= input_form("radio", "sexo","","M", "checked")?>Masculino&nbsp;
                    <?= input_form("radio", "sexo","","F")?>Feminino</td></tr>
                    <tr><td>Data Nascimento:*</td><td><?= input_form("", "nascimento","nascimento","","size='9'")?></td></tr>
                    <tr><td>Telefone(DDD sem 0):</td><td><?= input_form("", "telefone","telefone","","size='12'")?></td></tr>
                    <tr><td>RG:</td><td><?= input_form("", "rg","","","size='12'")?></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Login:*</td><td><?= input_form("", "login")?></td></tr>
                    <tr><td>Senha:*</td><td><?= input_form("password", "senha")?></td></tr>
                    <tr><td>Confirma Senha:*</td><td><?= input_form("password", "csenha")?></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
                <?= fecha_form() ?>
            </div>
            <?php 
            
            //Cadastro de Veiculo
            } elseif($_GET['tipo'] == "VC"){ ?>
                <h2>Cadastrar Veiculo</h2>
            <div class="box">     
                <?= abrir_form("post", "veiculo", "salvar.php?tipo=VC", "return validaVeiculo(this,'C');")?>
                <div class="form-group">
                    <label>Marca:*</label><?= input_form("", "marca","","","size='18' ")?></div>
                    <div class="form-group">
                    <label>Modelo:*</label><?= input_form("", "modelo","","","size='23'")?></div>
                     <div class="form-group">
                    <label>Cor:*</label><?= input_form("", "cor","","","size='12'")?></div>
                    <div class="form-group">
                    <label>Ano:*</label><?= input_form("", "ano","ano","","size='3'")?></div>
                     <div class="form-group">
                    <label>Placa:*</label><?= input_form("", "placa","placa","","size='7'")?></div>
                    <div class="form-group">
                    <label>Carroceria(Tamanho):</label>
                    <div class="form-group"><?= input_form("radio", "carroceria","","P")?>Pequeno&nbsp;
                    <?= input_form("radio", "carroceria","","M","checked")?>Médio&nbsp;
                    <?= input_form("radio", "carroceria","","G")?>Grande</div></div>
                  <hr/>
                     <div class="form-group">
                    <label><small>(<b>*</b>) Campos Obrigatórios</small></label>
                    
                    <tr><td colspan="2"><?= input2_form("button", "","","Cadastrar",array("class" => "btn btn-success","style" => "margin:auto"))?> <?=$botaovoltar?></td></tr>
                </div>
                <?= fecha_form() ?>
            </div>

                <?php 
                
                //Cadastro de Casa
            }elseif($_GET['tipo'] == "CS"){ ?>
                <h2>Cadastrar Casa:</h2>
            <div class="box">    
                <?= abrir_form("post", "casa", "salvar.php?tipo=CS", "return validaCasa(this,'C');")?>
                <div class="form-group">
                    <label>CEP:*</label><?= input_form("", "cep","cep","","size='12' onblur='javascript: pesquisacep(this.value);'")?></div>
                    <div class="form-group">
                    <label>Rua/Avenida:*</label><?= input_form("", "endereco","endereco","","size='31'")?>&nbsp;&nbsp;&nbsp;Nº:*&nbsp;<?= input_form("", "numero","numero","","size='5' onkeyup='mascara(this,\"9999\");' onkeypress='mascara(this,\"9999\");' ")?></div>
                    <div class="form-group">
                    <label>Bairro:*</label><?= input_form("", "bairro","bairro","","size='20'")?></div>
                    <div class="form-group">
                    <label>Cidade:*</label><?= input_form("", "cidade","cidade","","size='16'")?></div>
                    <div class="form-group">
                    <label>Estado (UF):*</label><?= input_form("", "estado","estado","","size='5' onkeyup='mascara(this,\"LL\");' onkeypress='mascara(this,\"LL\");' ")?></div>
                    <div class="form-group">
                    <label>Possui Seguro ?</label>
                    <?= input_form("radio", "seguro","","S")?>Sim&nbsp;
                    <?= input_form("radio", "seguro","","N","checked")?>Não</div>
                    <div class="form-group">
                    <label>Há presença de Animal na casa ?</label>
                    <?= input_form("radio", "animal","","S")?>Sim&nbsp;
                    <?= input_form("radio", "animal","","N","checked")?>Não</div>
                    <hr/>
                    <div class="form-group">
                    <label>Qual será o seu pacote ?</label>
                    <?= input_form("radio", "pacote","","15d","checked")?>15 dias: R$15,00&nbsp;
                    <?= input_form("radio", "pacote","","30d")?>30 dias: R$30,00&nbsp;
                    <?= input_form("radio", "pacote","","6m")?>aprox. 6 meses: R$182,00&nbsp;
                    <?= input_form("radio", "pacote","","1a")?>1 ano: R$365,00&nbsp;
                    </div>
                    
                    <div class="form-group">
                    <label>Procurar no mapa: </label>
                    <?= input_form("hidden", "latitude","latitude","","size='20' class=\"lat\"")?>
                    <?= input_form("hidden", "longitude","longitude","","size='20'")?>
                    
                    <input id="txtAddress" type="text" class="text" value=""/> <input type="button" id="btnGo" value="Procurar" />
                    <span id="spnCoordinates" style="color:Green;font-weight:bold;"></span>
                    </div>
                    <div class="form-group">
                    <label>(<b>*</b>) Campos Obrigatórios</small></label>
                    </div>
                   <div class="form-group">
                    <?= input2_form("button", "","","Cadastrar",array("class" => "btn btn-success","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></div>
                 <div class="form-group">
                 <div id="map_canvas" width="100%" height="250px">
                    </div>
                </div>
                <?= fecha_form() ?>
            </div>
                <?php 
                
                //Cadastro de Vaga
            }elseif($_GET['tipo'] == "VG"){ 
                   
                    ?>
                <h2>Adicionar vaga para uma casa:</h2>
            <div class="box">    
                <?= abrir_form("post", "vaga", "salvar.php?tipo=VG", "return validaVaga(this,'C');")?>
                   <label>Escolha a Casa</label>
                        <?php
                        $cs = new Casa();
                        $rst = $ib->executarSQL($cs->buscar(
                                array("cs_endereco","cs_codigo"),
                                array("cs_usuario"=>$_SESSION['codigo_usuario'])
                                ));
                        ?>
                                <div class="form-group"><select id="casadavaga" name="casaselect">
                                        <option value=""> ---- Selecione a casa ---- </option>
                            <?php
                            while($casa = $ib->obterDadosSQL($rst)){
                                echo "<option value='".$casa['cs_codigo']."'>".$casa['cs_endereco']."</option>";
                            }
                            ?>
                            </select></div>
                        <div class="form-group"><input type="button" id="botaoscasa" value="Adicionar" class="botao01"></div>
                
                <div id="inserirvaga" style="display:none">
                     <div class="form-group"><label>Descrição da vaga:</label><?= input_form("", "descricao")?></div>
                    <div class="form-group"><label>Tipo:*</label>
                    <?= input_form("radio", "tipo","","C","checked")?>Com Cobertura&nbsp;
                    <?= input_form("radio", "tipo","","S")?>Sem Cobertura</div>
                     <div class="form-group"><label>Tamanho:*</label>
                    <?= input_form("radio", "tamanho","","P")?>Pequeno&nbsp;
                    <?= input_form("radio", "tamanho","","M","checked")?>Medio&nbsp;
                    <?= input_form("radio", "tamanho","","G")?>Grande</div>
                     <div class="form-group"><label>Valor Inicial(por 15 minutos):</label><?= input_form("", "valor")?></div>
                    <div class="form-group"><small>(<b>*</b>) Campos Obrigatórios</small></div>
                   <div class="form-group"><?= input_form("hidden", "casa","campocasa")?></div>
                    <div class="form-group"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></div>
                </div>
                <?= fecha_form() ?>
            </div>
                <?php 
                
                //Cadastro de Serviços
                }elseif($_GET['tipo'] == "SV"){ ?>
                <h3 class="titulo1">Opçoes para alugar:</h3>
            <div class="container1">    
                <?php
                if(!isset($_POST['layers'])){?>
                <?= abrir_form("post", "servico", "cadastro.php?tipo=SV", "return validaServicoVeic(this);")?>
                <table >
                    <tr>
                        
                        <?php
                        $vc = new Veiculo();
                        $rst = $ib->executarSQL($vc->buscar(
                                array("vc_codigo","vc_marca","vc_modelo"),
                                array("vc_usuario"=>$_SESSION['codigo_usuario'])
                                ));
                        $nls = $ib->obterQtdeSQL($rst);
                        if($nls != 0){
                        ?>
                        <td>Escolha o Veiculo</td>
                                <td><select name="veic">
                                        <option value=""> ---- Selecione o veiculo ---- </option>
                            <?php
                            while($veiculo = $ib->obterDadosSQL($rst)){
                                echo "<option value='".$veiculo['vc_codigo']."'>".$veiculo['vc_marca']." - ".$veiculo['vc_modelo']."</option>";
                            }
                            ?>
                            </select></td>
                        <td><input type="hidden" name="vg" value="<?=$_GET['vg']?>"/>
                            <input type="hidden" name="layers" value="1"/>
                            <input type="submit" value="Adicionar" class="botao01"/></td>
                        <?php }else echo "Você ainda não possui veiculos registrados, <br>Registre um veiculo para continuar.<br><br>$botaovoltar" ?>
                    </tr>
                    
            </table>
                <?= fecha_form() ?>
                <br>
                <?php 
                }elseif($_POST['layers'] == 1){
                ?>
                <?= abrir_form("post", "servico", "cadastro.php?tipo=SV", "return validaServico(this,'C');")?>
                <br>
                <table>
                    <tr><td>Data Inicial:*</td><td><?= input_form("", "datai","datai")?>&nbsp;Hora:*</td><td><?= input_form("", "horai","horai")?></td></tr>
                    <tr><td>Data Final:*</td><td><?= input_form("", "dataf","dataf")?>&nbsp;Hora:*</td><td><?= input_form("", "horaf","horaf")?></td></tr>
                    
                    <tr><td>&nbsp;<?= input_form("hidden", "layers",'',"2")?>&nbsp;<?= input_form("hidden", "veiculo",'',$_POST['veic'])?>&nbsp;<?= input_form("hidden", "vaga","",$_POST['vg'])?></td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;
                        <?=input_form("button", "","","Cancelar",array("onclick"=>"window.location.href='index.php'",
                "class" => "botao01","style" => "margin:auto"))?></td></tr>
                </table>
                <?= fecha_form() ?>
                <?php }elseif($_POST['layers'] == 2){
                    
                    $vg = new Vaga();
                    
                    $vaga = $ib->obterDadosSQL($ib->executarSQL($vg->buscar("vg_valorinicial, vg_descricao",$_POST['vaga'])));
                    
                    $dtini = $_POST['datai']." ".$_POST['horai'];
                    $dtfin = $_POST['dataf']." ".$_POST['horaf'];
                    
                    $intervalos = ((timestampBarras($dtfin) - timestampBarras($dtini)) / (60*15));
                    
                    $valortotal = ($vaga['vg_valorinicial'] * $intervalos);
                ?>
                <?= abrir_form("post", "servico", "salvar.php?tipo=SV")?>
                <br>
                <table>
                    <tr><td colspan="2">O valor da locação de <?=$vaga['vg_descricao']?> deu <?="R$".number_format($valortotal, 2, ',', '.')?>.</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><?= input_form("hidden", "datai",'',$_POST['datai'])?>&nbsp;<?= input_form("hidden", "horai",'',$_POST['horai'])?>&nbsp;
                        <?= input_form("hidden", "dataf","",$_POST['dataf'])?>&nbsp;<?= input_form("hidden", "horaf","",$_POST['horaf'])?>&nbsp;
                        &nbsp;<?= input_form("hidden", "veiculo","",$_POST['veiculo'])?>&nbsp;<?= input_form("hidden", "vaga","",$_POST['vaga'])?>
                        &nbsp;<?= input_form("hidden", "valortotal","",$valortotal)?></td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Sim",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;
                        <?=input_form("button", "","","Cancelar",array("onclick"=>"window.location.href='index.php'",
                "class" => "botao01","style" => "margin:auto"))?></td></tr>
                </table>
                <?= fecha_form() ?>
                <?php } ?>
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