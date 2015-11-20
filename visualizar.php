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
    <?php include"includes/header_site.php";?>
  
        <script>
        //Função JQuery que serve para ativar impressão e esconder os botões "Imprimir" e "Voltar" para nao aparecer na impressão       
        $(document).ready(function(){
           $('#imprimir').click(function(){
               $(this).hide();
               $('#voltar').hide();
               window.print();
               $(this).show();
               $('#voltar').show();
           });
        });
        </script>  
    <?php

        //Incluindo arquivos para leitura de javascript e CSS
        include "includes/js-jquery.php"; 
        include "includes/css.php";  
        include "includes/maps.php";
        
        include"includes/cabec_site.php";
        $tp = $_GET['tipo']; 
        $cod = $_GET['cod'];
            
        ?> 

<div id="main-wrapper">
   <div id="main">
        <div id="main-inner">
            <div class="container">
        <div align="center">
            <?php
            switch($tp){
                case "US":
                    $us = new Usuario();
                    $dados = $ib->obterDadosSQL($ib->executarSQL($us->buscar("",$cod)));
                    $letrad = "o";
                    $tipo = "Usuario";
                    break;
                case "VC":
                    $vc = new Veiculo();
                    $dados = $ib->obterDadosSQL($ib->executarSQL($vc->buscar("",$cod)));
                    $letrad = "o";
                    $tipo = "Veiculo";
                    break;
                case "CS":
                    $cs = new Casa();
                    $dados = $ib->obterDadosSQL($ib->executarSQL($cs->buscar("",$cod)));
                    $letrad = "a";
                    $tipo = "Casa";
                    break;
                case "VG":
                    $vg = new Vaga();
                    $dados = $ib->obterDadosSQL($ib->executarSQL($vg->buscar("",$cod,"","",array("casa"))));
                    $letrad = "a";
                    $tipo = "Vaga";
                    break;
                case "SV":
                    $sv = new Servico();
                    $dados = $ib->obterDadosSQL($ib->executarSQL($sv->buscar("",$cod,"","",array("veiculo","vaga","casa","usuario p"))));
                    
                    $letrad = "o";
                    $tipo = "Serviço";
                    break;    
            }
            
            
            
            if(!isset($_GET['folha'])){
            include "includes/menu.php";
            ?>
            <h3 class="center">Dados d<?=$letrad?> <?=$tipo?></h3>
            <div class="box">
                <table class="table-striped table-bordered">
                <?php
                switch($tp){
                    case "US":
                        ?>
                    <tr><td>ID Usuario:</td><td><?=$cod?></td></tr>
                    <tr><td>Nome:</td><td><?=$dados['us_nome']?></td></tr>
                    <tr><td>CPF:</td><td><?=$dados['us_cpf']?></td></tr>
                    <tr><td>Sexo:</td><td><?=$dados['us_sexo']?></td></tr>
                    <tr><td>Telefone:</td><td><?=$dados['us_telefone']?></td></tr>
                    <tr><td>Data de Nascimento:</td><td><?=$dados['us_datanascimento']?></td></tr>
                    <tr><td>RG:</td><td><?=$dados['us_rg']?></td></tr>
                        <?php
                        break;
                    case "VC":
                        ?>
                    <tr><td>ID Veiculo:</td><td><?=$cod?></td></tr>
                    <tr><td>Marca:</td><td><?=$dados['vc_marca']?></td></tr>
                    <tr><td>Modelo:</td><td><?=$dados['vc_modelo']?></td></tr>
                    <tr><td>Placa:</td><td><?=$dados['vc_placa']?></td></tr>
                    <tr><td>Cor:</td><td><?=$dados['vc_cor']?></td></tr>
                    <tr><td>Ano:</td><td><?=$dados['vc_ano']?></td></tr>
                    <tr><td>Carroceria:</td><td><?php switch($dados['vc_carroceria']){case "P":echo"Pequeno";break; case "M":echo"Medio";break; case "G":echo"Grande";break;} ?></td></tr>
                        <?php
                        break;
                    case "CS":
                        ?>
                    <tr><td>ID Casa:</td><td><?=$cod?></td></tr>
                    <tr><td>CEP:</td><td><?=$dados['cs_cep']?></td></tr>
                    <tr><td>Endereço Completo:</td><td><?=$dados['cs_endereco']." ".$dados['cs_numero']?></td></tr>
                    <tr><td>Bairro:</td><td><?=$dados['cs_bairro']?></td></tr>
                    <tr><td>Cidade:</td><td><?=$dados['cs_cidade']?></td></tr>
                    <tr><td>Estado:</td><td><?=$dados['cs_estado']?></td></tr>
                    <tr><td>Tipo de pacote:</td><td><?php switch($dados['cs_pacote']){case 1:echo"15 dias";break; case 2:echo"30 dias";break; case 3:echo"6 meses";break; case 4:echo"1 ano";break;}?></td></tr>
                    <tr><td>Data de Criacao:</td><td><?=  formatar_data_barras($dados['cs_datacriacao'],"dd/mm/yyyy")?></td></tr>
                    <tr><td>Data de Vencimento do Cadastro:</td><td><?=  formatar_data_barras($dados['cs_datalimite'],"dd/mm/yyyy")?></td></tr>
                    <tr><td>Possui seguro:</td><td><?=($dados['cs_seguro']== "S"?"Sim":"Não")?></td></tr>
                    <tr><td>Andamento:</td><td><?=($dados['cs_bloqueado']=="S"?"Cadastro Vencido":"Cadastro Ativo")?></td></tr>
                    
                        <?php
                        break;
                    case "VG":
                        ?>
                    <tr><td>ID Vaga:</td><td><?=$cod?></td></tr>
                    <tr><td>Descrição:</td><td><?=$dados['vg_descricao']?></td></tr>
                    <tr><td>Pertence à:</td><td><a href="visualizar.php?tipo=CS&cod=<?=$dados['vg_casa']?>"><?=$dados['cs_endereco']." ".$dados['cs_numero']." - ".$dados['cs_bairro']."..."?></a></td></tr>
                    <tr><td>Valor Inicial:</td><td><?=  number_format($dados['vg_valorinicial'],2,",",".")?></td></tr>
                    <tr><td>Tamanho:</td><td><?php switch($dados['vg_tamanho']){case "P":echo"Pequeno";break; case "M":echo"Medio";break; case "G":echo"Grande";break;}?></td></tr>
                    <tr><td>Estilo:</td><td><?=($dados['vg_tipo']=='C'?"Com Cobertura":"Sem Cobertura")?></td></tr>
                    
                        <?php
                        break;
                    case "SV":
                        ?>
                    <tr><td>Nº do Serviço:</td><td><?=$cod?></td></tr>
                    <tr><td>Data Inicial:</td><td><?=  substr(formatar_datahora_barras($dados['sv_datainicial'],"dd/mm/yyyy"),0,-3)?></td></tr>
                    <tr><td>Data Final:</td><td><?=  substr(formatar_datahora_barras($dados['sv_datafinal'],"dd/mm/yyyy"),0,-3)?></td></tr>
                    <tr><td>Veiculo:</td><td><a href="visualizar.php?tipo=VC&cod=<?=$dados['sv_veiculo']?>"><?=$dados['vc_marca']." - ".$dados['vc_modelo']." - ".$dados['vc_placa']."..."?></a></td></tr>
                    <tr><td>Vaga:</td><td><a href="visualizar.php?tipo=VG&cod=<?=$dados['sv_vaga']?>"><?=$dados['vg_descricao']?></a></td></tr>
                    <tr><td>Valor do Serviço:</td><td><?=  number_format($dados['sv_valortotal'],2,",",".")?></td></tr>
                    <tr><td>Situacao:</td><td><?php switch($dados['sv_situacao']){case "P":echo"Pendente";break; case "A":echo"Aberto";break; case "F":echo"Fechado";break; case "C":echo"Cancelado";break;}?></td></tr>
                    <?php if($dados['sv_situacao'] == "F"){?>
                    <tr><td>Observaçao:</td><td><?=$dados['sv_observacao']?></td></tr>
                    <?php }
                        break;
                }               
                
                ?></table><br><br>
                    <input type="button" class="btn btn-success" value="Gerar Relatório" onclick="javascript: window.location.href='visualizar.php?tipo=<?=$tp?>&cod=<?=$cod?>&folha=1'"/>&nbsp;&nbsp;<input type="button" id="voltar" class="botao01" value="Voltar" onclick="javascript: window.history.go(-1)"/>
                
            </div>
            <?php } else{?>
            <div class="box">
                <br><br>
                <h1>ESTACIONE AQUI.COM</h1>
                
                <h2>Relatório d<?=$letrad?> <?=$tipo?></h2>
                <table class="table-striped table-bordered table-responsive">
                <?php
                switch($tp){
                    case "US":
                        ?>
                    <tr><td>ID Usuario:</td><td><?=$cod?></td></tr>
                    <tr><td>Nome:</td><td><?=$dados['us_nome']?></td></tr>
                    <tr><td>CPF:</td><td><?=$dados['us_cpf']?></td></tr>
                    <tr><td>Sexo:</td><td><?=$dados['us_sexo']?></td></tr>
                    <tr><td>Telefone:</td><td><?=$dados['us_telefone']?></td></tr>
                    <tr><td>Data de Nascimento:</td><td><?=$dados['us_datanascimento']?></td></tr>
                    <tr><td>RG:</td><td><?=$dados['us_rg']?></td></tr>
                        <?php
                        break;
                    case "VC":
                        ?>
                    <tr><td>ID Veiculo:</td><td><?=$cod?></td></tr>
                    <tr><td>Marca:</td><td><?=$dados['vc_marca']?></td></tr>
                    <tr><td>Modelo:</td><td><?=$dados['vc_modelo']?></td></tr>
                    <tr><td>Placa:</td><td><?=$dados['vc_placa']?></td></tr>
                    <tr><td>Cor:</td><td><?=$dados['vc_cor']?></td></tr>
                    <tr><td>Ano:</td><td><?=$dados['vc_ano']?></td></tr>
                    <tr><td>Carroceria:</td><td><?php switch($dados['vc_carroceria']){case "P":echo"Pequeno";break; case "M":echo"Medio";break; case "G":echo"Grande";break;} ?></td></tr>
                        <?php
                        break;
                    case "CS":
                        ?>
                    <tr><td>ID Casa:</td><td><?=$cod?></td></tr>
                    <tr><td>CEP:</td><td><?=$dados['cs_cep']?></td></tr>
                    <tr><td>Endereço Completo:</td><td><?=$dados['cs_endereco']." ".$dados['cs_numero']?></td></tr>
                    <tr><td>Bairro:</td><td><?=$dados['cs_bairro']?></td></tr>
                    <tr><td>Cidade:</td><td><?=$dados['cs_cidade']?></td></tr>
                    <tr><td>Estado:</td><td><?=$dados['cs_estado']?></td></tr>
                    <tr><td>Tipo de pacote:</td><td><?php switch($dados['cs_pacote']){case 1:echo"15 dias";break; case 2:echo"30 dias";break; case 3:echo"6 meses";break; case 4:echo"1 ano";break;}?></td></tr>
                    <tr><td>Data de Criacao:</td><td><?=  formatar_data_barras($dados['cs_datacriacao'],"dd/mm/yyyy")?></td></tr>
                    <tr><td>Data de Vencimento do Cadastro:</td><td><?=  formatar_data_barras($dados['cs_datalimite'],"dd/mm/yyyy")?></td></tr>
                    <tr><td>Possui seguro:</td><td><?=($dados['cs_seguro']== "S"?"Sim":"Não")?></td></tr>
                    <tr><td>Andamento:</td><td><?=($dados['cs_bloqueado']=="S"?"Cadastro Vencido":"Cadastro Ativo")?></td></tr>
                    
                        <?php
                        break;
                    case "VG":
                        ?>
                    <tr><td>ID Vaga:</td><td><?=$cod?></td></tr>
                    <tr><td>Descrição:</td><td><?=$dados['vg_descricao']?></td></tr>
                    <tr><td>Pertence à:</td><td><?=$dados['cs_endereco']." ".$dados['cs_numero']." - ".$dados['cs_bairro']."..."?></td></tr>
                    <tr><td>Valor Inicial:</td><td><?=  number_format($dados['vg_valorinicial'],2,",",".")?></td></tr>
                    <tr><td>Tamanho:</td><td><?php switch($dados['vg_tamanho']){case "P":echo"Pequeno";break; case "M":echo"Medio";break; case "G":echo"Grande";break;}?></td></tr>
                    <tr><td>Estilo:</td><td><?=($dados['vg_tipo']=='C'?"Com Cobertura":"Sem Cobertura")?></td></tr>
                    
                        <?php
                        break;
                    case "SV":
                        ?>
                    <tr><td>Nº do Serviço:</td><td><?=$cod?></td></tr>
                    <tr><td>Data Inicial:</td><td><?=  substr(formatar_datahora_barras($dados['sv_datainicial'],"dd/mm/yyyy"),0,-3)?></td></tr>
                    <tr><td>Data Final:</td><td><?=  substr(formatar_datahora_barras($dados['sv_datafinal'],"dd/mm/yyyy"),0,-3)?></td></tr>
                    <tr><td>Veiculo:</td><td><?=$dados['vc_marca']." - ".$dados['vc_modelo']." - ".$dados['vc_placa']."..."?></td></tr>
                    <tr><td>Vaga:</td><td><?=$dados['vg_descricao']?></td></tr>
                    <tr><td>Valor do Serviço:</td><td><?=  number_format($dados['sv_valortotal'],2,",",".")?></td></tr>
                    <tr><td>Situacao:</td><td><?php switch($dados['sv_situacao']){case "P":echo"Pendente";break; case "A":echo"Aberto";break; case "F":echo"Fechado";break; case "C":echo"Cancelado";break;}?></td></tr>
                    <?php if($dados['sv_situacao'] == "F"){?>
                    <tr><td>Observaçao:</td><td><?=$dados['sv_observacao']?></td></tr>
                    <?php }
                        break;
                }               
                
                ?></table><br><br>
                    <input type="button" id="imprimir" class="btn btn-success" value="Imprimir"/>&nbsp;&nbsp;<input type="button" id="voltar" class="botao01" value="Voltar" onclick="javascript: window.history.go(-1)"/>
                
                
            </div>
            <?php }
            $ib->fecharBanco();
            
            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>