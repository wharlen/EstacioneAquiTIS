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
        
        <script type="text/javascript">
            
            $(document).ready(function(){
               $("#enq1").click(function(){
                   $("#nota").val("1");
                   $("#enq1").addClass("selecEnquete");
                   $("#enq2").removeClass("selecEnquete");
                   $("#enq3").removeClass("selecEnquete");
                   $("#enq4").removeClass("selecEnquete");
                   $("#enq5").removeClass("selecEnquete");
               });
               $("#enq2").click(function(){
                   $("#nota").val("2");
                   $("#enq1").removeClass("selecEnquete");
                   $("#enq2").addClass("selecEnquete");
                   $("#enq3").removeClass("selecEnquete");
                   $("#enq4").removeClass("selecEnquete");
                   $("#enq5").removeClass("selecEnquete");
               });
               $("#enq3").click(function(){
                   $("#nota").val("3");
                   $("#enq1").removeClass("selecEnquete");
                   $("#enq2").removeClass("selecEnquete");
                   $("#enq3").addClass("selecEnquete");
                   $("#enq4").removeClass("selecEnquete");
                   $("#enq5").removeClass("selecEnquete");
               });
               $("#enq4").click(function(){
                   $("#nota").val("4");
                   $("#enq1").removeClass("selecEnquete");
                   $("#enq2").removeClass("selecEnquete");
                   $("#enq3").removeClass("selecEnquete");
                   $("#enq4").addClass("selecEnquete");
                   $("#enq5").removeClass("selecEnquete");
               });
               $("#enq5").click(function(){
                   $("#nota").val("5");
                   $("#enq1").removeClass("selecEnquete");
                   $("#enq2").removeClass("selecEnquete");
                   $("#enq3").removeClass("selecEnquete");
                   $("#enq4").removeClass("selecEnquete");
                   $("#enq5").addClass("selecEnquete");
               });
            });
            
        </script>
        
    </head>
    <body>
        <div align="center">
            <?php
            
            include "includes/menu.php";
            
            ?>
            <h3 class="titulo1">Enquete de satisfação</h3>
            <div class="container1">
                <?=abrir_form("post", "satisfacao", "salvar.php?tipo=SF", "return validaEnquete(this);")?>
                
                <?php
                    $us = new Usuario();
                    $results = $ib->executarSQL($us->buscar("distinct us_nome, us_codigo","inner join casa on us_codigo = cs_usuario "
                            . "inner join vaga on cs_codigo = vg_casa inner join servico "
                            . "on vg_codigo = sv_vaga where sv_usuario = '".$_SESSION['codigo_usuario']."' "
                            . "and sv_status != 'E' and us_codigo != '".$_SESSION['codigo_usuario']."' and us_status != 'E'","sql")); 
                    $qtds = $ib->obterQtdeSQL($results);
                    if($qtds != 0){
                ?>
                <p>Escolha o proprietário:</p>
                <select name="proprietario">
                    <option value="">-- Selecione o proprietário --</option>
                    <?php
                        while($prop = $ib->obterDadosSQL($results)){
                            echo"<option value='".$prop['us_codigo']."'>".$prop['us_nome']."</option>";
                        }
                    ?>
                </select>
                <br><br>
                <p>Qual o tipo de avaliação?</p>
                <div id="enquete">
                    <div style="background-color:#6b6" id="enq1">Otimo</div>&nbsp;
                    <div style="background-color:#85bb66" id="enq2">Bom</div>&nbsp;
                    <div style="background-color:#bbbb66" id="enq3">Regular</div>&nbsp;
                    <div style="background-color:#bb8566" id="enq4">Ruim</div>&nbsp;
                    <div style="background-color:#bb6666" id="enq5">Péssimo</div>
                </div><br>
                <?=input_form("hidden","nota","nota")?>
                <?=input_form("submit","","","Avaliar")?>
                <?=fecha_form()?>
                <?php
                    }else{
                       echo "Não há proprietários à serem avaliados!<br><br>";
                       ?>
                       <input type="button" class="botao01" value="Voltar" onclick="javascript: window.location.href='principal.php'"    
                       <?php
                    }
                    $ib->fecharBanco();
                ?>
            </div>
            
        </div>
    </body>
</html>