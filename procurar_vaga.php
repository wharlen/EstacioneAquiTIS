<?php
    //ARQUIVO QUE SERVE PARA FAZER PROCURA DE VAGAS NO SISTEMA

    //se caso o sistema estiver logado
    if(!isset($_POST['researchv'])){
        require "includes/sessao.php";
        $sqlsess = "and cs_usuario != '".$_SESSION['codigo_usuario']."'";//adicionano condição se caso estiver logado, pois não irá buscar a casa pertencente ao usuario.
    }else $sqlsess = "";
    
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
        
    </head>
    <body>
        <div align="center">
            <?php
            
            include "includes/menu.php";
            
             
                
                               
                    echo "<h2 class='titulo1'>Casas com vagas Disponiveis</h2>";
                ?>
            <div class="container1">    
                <?php
                $cs = new Casa();
                if(isset($_POST['research'])||isset($_POST['researchv'])){
                    
                    if(isset($_POST['research']))$buscas = $_POST['research'];
                    elseif(isset($_POST['researchv']))$buscas = $_POST['researchv'];
                    
                    if($buscas != ""){
                    $research = "and (cs_endereco like '%".$buscas."%' or "
                            . "cs_numero = '".$buscas."' or "
                            . "cs_bairro like '%".$buscas."%' or "
                            . "cs_cidade like '%".$buscas."%' or "
                            . "cs_estado like '%".$buscas."%'"
                            . ")";
                    }else  $research = "";
                }else $research = "";
                $ib->executarSQL($cs->editar(array("cs_bloqueado"=>"S"),"cs_bloqueado != 'S' and cs_datalimite < '".date('Y-m-d')."' ","sql"));
                
                $vg = new Vaga();
                $result1 = $ib->executarSQL($vg->buscar("distinct cs_endereco, cs_codigo, us_nome",
                    "where vg_situacao != 'O' and vg_bloqueado = 'N' and cs_bloqueado = 'N' $sqlsess and vg_status != 'E' $research","sql","cs_codigo",array("casa","usuario")));
                
                
               
                $nla = $ib->obterQtdeSQL($result1);
                if($nla != 0){
                   while($casa = $ib->obterDadosSQL($result1)){
                     $result2 = $ib->executarSQL($vg->buscar("",array("vg_casa"=>$casa['cs_codigo'],"vg_situacao"=>"!O","vg_bloqueado"=>"N"),"!E","vg_tipo"));
                     $nlb = $ib->obterQtdeSQL($result2);
                if($nlb != 0){
                ?>
            <div class='tablediv'>
                <h3><?=strtoupper(normalizarString($casa['cs_endereco']." -- ".$casa['us_nome']))?></h3>
                
            <table border="1" class="tabela1">
                <thead><tr>
                    <th width="30%">Descricão</th>
                    <th width="25%">Tipo</th>
                    <th width="20%">Tamanho</th>
                    <th width="10%">Valor/15min</th>
                    <th width="15%">Opções</th>
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
                    <td><?=$vaga['vg_descricao']?></td>
                    <td><?=$tipo?></td>
                    <td><?=$tamanho?></td>
                    <td><?="R$".number_format($vaga['vg_valorinicial'], 2, ',', '.')?></td>
                    <td>
                        <a href="cadastro.php?tipo=SV&vg=<?=$vaga['vg_codigo']?>">Entrar</a>
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
           </table>
            
            </div>  <br><br> 
                    <?php
                   }
                   
                   }
                   ?> <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="index.php"'></p>
            </div> <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Casas com vagas disponiveis.</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"index.php"'."'></p>"
                    . "</div>";
                }
                               
               $ib->fecharBanco(); 
            ?>
                        
            </div>
        </div>
    </body>
</html>