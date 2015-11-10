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
        ?>
        
    </head>
    <body>
        <div align="center">
            <?php
            //incluindo arquivo de menus
            include "includes/menu.php";
            
            if(isset($_GET)){
                $wdt = $hdt = "20";//Tamanho padrão para as imagens das opções na tabela: width:20 e height:20
            
            //Galeria de Veiculo    
            if($_GET['tipo'] == "VC"){ 
                
                echo "<h2 class='titulo1'>Meus Veiculos</h2>";
           ?>
            <div class="container1">    
                <?php     
                $vc = new Veiculo();
                $result = $ib->executarSQL($vc->buscar("",array("vc_usuario"=>$_SESSION['codigo_usuario']),"!E","vc_marca"));
                $nl = $ib->obterQtdeSQL($result);
                if($nl != 0){
                    ?><div>
            <table border="1"  class='tabela1'>
                <thead>
                <tr>
                    <th width="25%">Marca</th>
                    <th width="25%">Modelo</th>
                    <th width="15%">Placa</th>
                    <th width="10%">Cor</th>
                    <th width="10%">Ano</th>
                    <th width="15%">Opçoes</th>
                </tr></thead>
                <?php
                while($veiculo = $ib->obterDadosSQL($result)){
                ?>
                <tbody>
                <tr>
                    <td><?=$veiculo['vc_marca']?></td>
                    <td><?=$veiculo['vc_modelo']?></td>
                    <td><?=$veiculo['vc_placa']?></td>
                    <td><?=$veiculo['vc_cor']?></td>
                    <td><?=$veiculo['vc_ano']?></td>
                    <td>
                        <a href="visualizar.php?tipo=VC&cod=<?=$veiculo['vc_codigo']?>" title="Visualizar"><img src="img/visualizar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <a href="edicao.php?tipo=VC&cod=<?=$veiculo['vc_codigo']?>"><img src="img/editar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <a href="javascript: validaExclusao('<?=$veiculo['vc_codigo']?>', 'VC');" title="Excluir"><img src="img/excluir.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        
                    </td>
                </tr></tbody>
            
                <?php }
                ?>
            </table> </div>   
                <?php?> <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="principal.php"'></p>
           <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Veiculos Cadastrados</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"principal.php"'."'></p>"
                    . "</div>";
                }
                ?></div><?php
                
                //Galeria de Casa
                }elseif($_GET['tipo'] == "CS"){ 
                
                    echo "<h2 class='titulo1'>Minhas Casas</h2>";
                ?>
            <div class="container1">    
                <?php       
                $cs = new Casa();
                $result = $ib->executarSQL($cs->buscar("",array("cs_usuario"=>$_SESSION['codigo_usuario'], "cs_bloqueado"=>"!S"),"!E","cs_cidade"));
                $nl = $ib->obterQtdeSQL($result);
                if($nl != 0){
                    ?><div>
            <table border="1" class='tabela1'>
                <thead><tr>
                    <th width="35%">Endereco</th>
                    <th width="25%">Bairro</th>
                    <th width="15%">Cidade</th>
                    <th width="15%">Estado</th>
                    <th width="10%">Opçoes</th>
                    </tr></thead>
                <?php
                while($casa = $ib->obterDadosSQL($result)){
                ?>
                <tbody><tr>
                    <td><?=$casa['cs_endereco']?></td>
                    <td><?=$casa['cs_bairro']?></td>
                    <td><?=$casa['cs_cidade']?></td>
                    <td><?=$casa['cs_estado']?></td>
                    <td>
                        <a href="visualizar.php?tipo=CS&cod=<?=$casa['cs_codigo']?>" title="Visualizar"><img src="img/visualizar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <a href="edicao.php?tipo=CS&cod=<?=$casa['cs_codigo']?>"><img src="img/editar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <a href="javascript: validaExclusao('<?=$casa['cs_codigo']?>','CS');" title="Excluir"><img src="img/excluir.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
            </table>  </div> 
                    <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="principal.php"'></p>
            <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Casas cadastradas</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"principal.php"'."'></p>"
                    . "</div>";
                }
                ?></div><?php 
                
                
                //Galeria de Vaga
                }elseif($_GET['tipo'] == "VG"){ 
                
                    echo "<h2 class='titulo1'>Configurar Vagas</h2>";
                ?>
            <div class="container1">    
                <?php       
                $vg = new Vaga();
                $result1 = $ib->executarSQL($vg->buscar("distinct cs_endereco, cs_numero, cs_codigo",array("cs_usuario"=>$_SESSION['codigo_usuario']),"!E","cs_codigo","casa"));
                $nla = $ib->obterQtdeSQL($result1);
                if($nla != 0){
                   while($casa = $ib->obterDadosSQL($result1)){
                     $result2 = $ib->executarSQL($vg->buscar("",array("vg_casa"=>$casa['cs_codigo']),"!E","vg_tipo"));
                     $nlb = $ib->obterQtdeSQL($result2);
                if($nlb != 0){
                ?>
            <div class='tablediv'>
                <h3 style="cursor:pointer" onclick="javascript: window.location.href='visualizar.php?tipo=CS&cod=<?=$casa['cs_codigo']?>'"><?=strtoupper(normalizarString($casa['cs_endereco'].", ".$casa['cs_numero']))?></h3>
               
                
            <table border="1" class='tabela1'>
                <thead><tr>
                   
                    <th width="30%">Tipo</th>
                    <th width="30%">Tamanho</th>
                    <th width="20%">Valor/15m</th>
                    <th width="20%">Opções</th>
                    </tr></thead>
                <?php
                while($vaga = $ib->obterDadosSQL($result2)){
                ?>
                <tbody><tr>
                    <?php 
                    switch($vaga['vg_tipo']){
                        case "C":
                            $tipo = "Com cobertura";
                        case "S":
                            $tipo = "Sem Cobertura";
                    }
                    
                    switch($vaga['vg_tamanho']){
                        case "P":
                            $tamanho = "Pequena";
                        case "M":
                            $tamanho = "Media";
                        case "G":
                            $tamanho = "Grande";
                    }
                    
                    
                    
                    ?>
                    <td><?=$tipo?></td>
                    <td><?=$tamanho?></td>
                    <td><?="R$".number_format($vaga['vg_valorinicial'], 2, ',', '.')?></td>
                    <td>
                        <a href="visualizar.php?tipo=VG&cod=<?=$vaga['vg_codigo']?>" title="Visualizar"><img src="img/visualizar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <a href="edicao.php?tipo=VG&cod=<?=$vaga['vg_codigo']?>"><img src="img/editar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <a href="javascript: validaExclusao('<?=$vaga['vg_codigo']?>', 'VG');" title="Excluir"><img src="img/excluir.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
           </table> </div> 
             <br><br> 
                    <?php
                   }
                   
                   }
                   ?> <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="principal.php"'></p>
             <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Vagas Cadastradas</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"principal.php"'."'></p>"
                    . "</div>";
                }
                ?></div><?php 
                
                //Galeria de serviços
                }elseif($_GET['tipo'] == "SV"){ 
                
                    echo "<h2 class='titulo1'>Meus Servicos</h2>";
                ?>
            <div class="container1">    
                <?php       
                $sv = new Servico();
                $result1 = $ib->executarSQL($sv->buscar("sv_codigo, cs_endereco, vg_descricao, cs_numero, vc_marca, vc_modelo, sv_datainicial, sv_datafinal, sv_valortotal, sv_situacao",
                        array("sv_usuario"=>$_SESSION['codigo_usuario']),"!E","sv_codigo",array("vaga", "casa", "veiculo")));
                $nl = $ib->obterQtdeSQL($result1);
                if($nl != 0){
                    ?><div>
            <table border="1" class='tabela1'>
                <thead><tr>
                    <th width="3%">Nº do Serviço</th>
                    <th width="24%">Endereco</th>
                    <th width="16%">Vaga</th>
                    <th width="20%">Veiculo</th>
                    <th width="10%">Data de Locação</th>
                    <th width="10%">Data de Término</th>
                    <th width="5%">Valor de Locaçao</th>
                    <th width="6%">Situação</th>
                    <th width="6%">Opçoes</th>
                    </tr></thead>
                <?php
                while($serv = $ib->obterDadosSQL($result1)){
                    
                    switch($serv['sv_situacao']){
                        case "P": 
                            $situacao = "Pendente";
                            break;
                        case "A":
                            $situacao = "Em Aberto";
                            break;
                        case "F":
                            $situacao = "Fechado";
                            break;
                    }
                    
                ?>
                <tbody><tr>
                    <td><?=$serv['sv_codigo']?></td>
                    <td><?=$serv['cs_endereco']." - ".$serv['cs_numero']?></td>
                    <td><?=$serv['vg_descricao']?></td>
                    <td><?=$serv['vc_marca']." - ".$serv['vc_modelo']?></td>
                    <td><?=formatar_data_barras($serv['sv_datainicial'],"dd/mm/yyyy")." ".substr(obter_sohora($serv['sv_datainicial']),0,5)?></td>
                    <td><?=formatar_data_barras($serv['sv_datafinal'],"dd/mm/yyyy")." ".substr(obter_sohora($serv['sv_datafinal']),0,5)?></td>
                    <td><?="R$".number_format($serv['sv_valortotal'],2,",",".")?></td>
                    <td><?=$situacao?></td>
                    <td>
                        <a href="visualizar.php?tipo=SV&cod=<?=$serv['sv_codigo']?>" title="Visualizar"><img src="img/visualizar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                <!--    <a href="edicao.php?tipo=SV&cod=<?=$serv['cs_codigo']?>"><img src="img/editar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>-->
                        <?php if($serv['sv_situacao'] != 'F'){?>
                        <a href="javascript: validaCancelar('<?=$serv['sv_codigo']?>','SV');" title="Cancelar Serviço"><img src="img/cancelar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                        <?php } ?>
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
            </table>  </div> 
                    <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="principal.php"'></p>
            <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Serviços </p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"principal.php"'."'></p>"
                    . "</div>";
                }
                ?></div><?php               
                }elseif($_GET['tipo'] == "SVU"){ 
                
                    echo "<h2 class='titulo1'>Servicos de Clientes</h2>";
                ?>
            <div class="container1">    
                <?php       
                $sv = new Servico();
                $result1 = $ib->executarSQL($sv->buscar("sv_codigo, cs_endereco, us_nome, us_cpf, vg_descricao, cs_numero, vc_marca, vc_modelo, sv_datainicial, sv_datafinal, sv_valortotal, sv_situacao",
                        array("cs_usuario"=>$_SESSION['codigo_usuario'], "sv_situacao"=>"!P"),"!E","sv_codigo",array("vaga", "casa", "veiculo", "usuario c")));
                $nl = $ib->obterQtdeSQL($result1);
                if($nl != 0){
                    ?><div>
            <table border="1" class='tabela1'>
                <thead><tr>
                    <th width="5%">Nº do Serviço</th>
                    <th width="17%">Cliente</th>
                    <th width="15%">Endereco</th>
                    <th width="10%">Vaga</th>
                    <th width="12%">Veiculo</th>
                    <th width="8%">Data de Locação</th>
                    <th width="8%">Data de Término</th>
                    <th width="8%">Valor de Locaçao</th>
                    <th width="8%">Situação</th>
                    <th width="9%">Opçoes</th>
                    </tr></thead>
                <?php
                while($serv = $ib->obterDadosSQL($result1)){
                    
                    switch($serv['sv_situacao']){
                        case "P": 
                            $situacao = "Pendente";
                            break;
                        case "A":
                            $situacao = "Em Aberto";
                            break;
                        case "F":
                            $situacao = "Fechado";
                            break;
                    }
                    
                ?>
                <tbody><tr>
                    <td><?=$serv['sv_codigo']?></td>
                    <td><?=$serv['us_nome']?></td>
                    <td><?=$serv['cs_endereco']." - ".$serv['cs_numero']?></td>
                    <td><?=$serv['vg_descricao']?></td>
                    <td><?=$serv['vc_marca']." - ".$serv['vc_modelo']?></td>
                    <td><?=formatar_data_barras($serv['sv_datainicial'],"dd/mm/yyyy")." ".substr(obter_sohora($serv['sv_datainicial']),0,5)?></td>
                    <td><?=formatar_data_barras($serv['sv_datafinal'],"dd/mm/yyyy")." ".substr(obter_sohora($serv['sv_datafinal']),0,5)?></td>
                    <td><?="R$".number_format($serv['sv_valortotal'],2,",",".")?></td>
                    <td><?=$situacao?></td>
                    <td>
                        <a href="visualizar.php?tipo=SV&cod=<?=$serv['sv_codigo']?>" title="Visualizar"><img src="img/visualizar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>
                <!--    <a href="edicao.php?tipo=SV&cod=<?=$serv['cs_codigo']?>"><img src="img/editar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>-->
                        <!--<a href="javascript: validaCancelar('<?=$serv['cs_codigo']?>','SV');" title="Cancelar Serviço"><img src="img/cancelar.gif" width="<?=$wdt?>" height="<?=$hdt?>"/></a>-->
                        
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
            </table>  </div> 
                    <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="principal.php"'></p>
            <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Serviços </p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"principal.php"'."'></p>"
                    . "</div>";
                }
                ?></div><?php           
                }
                
                $ib->fecharBanco();
            }
            ?>
            </div>
        </div>
    </body>
</html>