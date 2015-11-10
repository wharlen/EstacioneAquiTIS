<?php
    
    require "includes/sessao.php";
    
    require "includes/database.php";
    require "includes/modelo.php";
    
    include "includes/funcoes.php";
    
    include "includes/configsys.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$titulosys?></title>
        <?php   
            include "includes/js-jquery.php"; 
            include "includes/css.php"; 
        ?>
        
    </head>
    <body>
        <div align="center">
            <?php
            
            include "includes/menu.php";
            
            if(!isset($_GET['t'])&& !isset($_GET['cod'])){
                
                    echo "<h2 class='titulo1'>Cadastros Expirados</h2>";
                ?>
            <div class="container1">    
                <?php       
                $cs = new Casa();
                $result = $ib->executarSQL($cs->buscar("",array("cs_usuario"=>$_SESSION['codigo_usuario'],"cs_bloqueado"=>"S"),"!E","cs_cidade"));
                $nl = $ib->obterQtdeSQL($result);
                if($nl != 0){
                    ?><div>
            <table border="1" class='tabela1'>
                <thead><tr>
                    <th>Endereco</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Opçoes</th>
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
                        <a href="renovar_casa.php?cod=<?=$casa['cs_codigo']?>" title="Visualizar">Renovar</a>
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
            </table>  </div> 
                    <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="principal.php"'></p>
            <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Cadastros expirados no momento.</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"principal.php"'."'></p>"
                    . "</div>";
                }
                
             }elseif(isset($_GET['cod'])){?>
                 <h3>Renovando Pacote:</h3>
            <div class="container1">    
                <?= abrir_form("post", "casa", "salvar.php?tipo=CS")?>
                <table>
                    
                    <tr><td>Qual será o seu novo pacote ?</td><td>
                    <?= input_form("radio", "pacote","","15d","checked")?>15 dias: R$15,00&nbsp;
                    <?= input_form("radio", "pacote","","30d")?>30 dias: R$30,00&nbsp;
                    <?= input_form("radio", "pacote","","6m")?>aprox. 6 meses: R$182,00&nbsp;
                    <?= input_form("radio", "pacote","","1a")?>1 ano: R$365,00&nbsp;
                    </td></tr>
                    <tr><td>&nbsp;<?= input_form("hidden", "codigo","",$_GET['cod'])?></td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Confirmar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
                <?= fecha_form() ?>
            </div>
                 <?php
                 
             }elseif(isset($_POST['codigo']) && isset($_POST['pacote'])){
                 
                $dataCriacao = date("d/m/Y");
                $diasprazo = 0;
                $pacote = "";
                switch($_POST['pacote']){
                    case "15d":
                        $diasprazo = 15;
                        $pacote = "1";
                        $valor = 15.00;
                        break;
                    case "30d":
                        $diasprazo = 30;
                        $pacote = "2";
                        $valor = 30.00;
                        break;
                    case "6m":
                        $diasprazo = 182;
                        $pacote = "3";
                        $valor = 182.00;
                        break;
                    case "1a":
                        $diasprazo = 365;
                        $pacote = "4";
                        $valor = 365.00;
                        break;                    
                }

                $dataLimite = SomarData($dataCriacao, $diasprazo);
                 
                 
                $cs = new Casa();
                $cs->setPacote($pacote);
                $cs->setDataLimite($dataLimite);
                $cs->setCodigo($_POST['codigo']);
                
                $ib->executarSQL($cs->editar(array(
                    "cs_pacote"=>$cs->getPacote(),
                    "cs_dataLimite"=>$cs->getDataLimite()
                ),$cs->getCodigo()));
        
                $fd = new Fundo();

                $ib->executarSQL($fd->aumentarValor($valor));
                header("location: mensagens.php?m=18");exit;
             }
                             
                
                
                $ib->fecharBanco();
            
            ?>
            </div>
        </div>
    </body>
</html>