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
        <title><?= $titulosys ?></title>
        <?php
        include "includes/js-jquery.php";
        include "includes/css.php";
        ?>

        <script type="text/javascript">

            $(document).ready(function () {
                $('#lix input[type="radio"]').click(function () {


                    if ($(this).attr("value") == "1") {
                        $("#VC").show();
                        $("#CS").hide();
                        $("#VG").hide();
                        $("#SV").hide();
                    }

                    if ($(this).attr("value") == "2") {
                        $("#VC").hide();
                        $("#CS").show();
                        $("#VG").hide();
                        $("#SV").hide();
                    }

                    if ($(this).attr("value") == "3") {
                        $("#VC").hide();
                        $("#CS").hide();
                        $("#VG").show();
                        $("#SV").hide();
                    }

                    if ($(this).attr("value") == "4") {
                        $("#VC").hide();
                        $("#CS").hide();
                        $("#VG").hide();
                        $("#SV").show();
                    }

                });
            });

        </script>

    </head>
    <body>
        <div align="center">
            <?php
            include "includes/menu.php";


            $wdt = $hdt = "20";
            ?>
            <h2 class="titulo1">Lixeira</h2>
            <div class="container1" id="lix">
                
                <br>
                <table>
                    <tr>
                        <td><?= input_form("radio", "opc", "", "1") ?> Veiculo</td>
                        <td><?= input_form("radio", "opc", "", "2") ?> Casa</td>
                        <td><?= input_form("radio", "opc", "", "3") ?> Vaga</td>
                        <td><?= input_form("radio", "opc", "", "4") ?> Serviço</td>
                    </tr>
                </table>

            </div><br> <br>
            <div id="VC" style="display:none">   

                <div class="container1">    
                <?php
                $vc = new Veiculo();
                $result = $ib->executarSQL($vc->buscar("", array("vc_usuario" => $_SESSION['codigo_usuario']), "E", "vc_marca"));
                $nl = $ib->obterQtdeSQL($result);
                if ($nl != 0) {
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
    while ($veiculo = $ib->obterDadosSQL($result)) {
        ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $veiculo['vc_marca'] ?></td>
                                            <td><?= $veiculo['vc_modelo'] ?></td>
                                            <td><?= $veiculo['vc_placa'] ?></td>
                                            <td><?= $veiculo['vc_cor'] ?></td>
                                            <td><?= $veiculo['vc_ano'] ?></td>
                                            <td>
                                                <a href="javascript: validaRestaurar('<?= $veiculo['vc_codigo'] ?>', 'VC');" title="Restaurar"><img src="img/restaurar.png" width="<?= $wdt ?>" height="<?= $hdt ?>"/></a>

                                            </td>
                                        </tr></tbody>

    <?php }
    ?>
                            </table> </div>   
                                <?php ?> 
                                <?php
                            } else {
                                echo "<div align='center'><p>Não há Veiculos Excluidos</p>"
                                
                                . "</div>";
                            }
                            ?>
                </div></div><div id="CS" style="display:none">   
                    
                <div class="container1">    
                    <?php
                    $cs = new Casa();
                    $result = $ib->executarSQL($cs->buscar("", array("cs_usuario" => $_SESSION['codigo_usuario']), "E", "cs_cidade"));
                    $nl = $ib->obterQtdeSQL($result);
                    if ($nl != 0) {
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
    while ($casa = $ib->obterDadosSQL($result)) {
        ?>
                                    <tbody><tr>
                                            <td><?= $casa['cs_endereco'] ?></td>
                                            <td><?= $casa['cs_bairro'] ?></td>
                                            <td><?= $casa['cs_cidade'] ?></td>
                                            <td><?= $casa['cs_estado'] ?></td>
                                            <td>
                                                <a href="javascript: validaRestaurar('<?= $casa['cs_codigo'] ?>','CS');" title="Restaurar"><img src="img/restaurar.png" width="<?= $wdt ?>" height="<?= $hdt ?>"/></a>

                                            </td>
                                        </tr></tbody>

    <?php }
    ?>
                            </table>  </div> 
                        
    <?php
} else {
    echo "<div align='center'><p>Não há Casas Excluidas</p>"
    
    . "</div>";
}
?>
                </div></div><div id="VG" style="display:none">   
                    
                <div class="container1">    
                    <?php
                    $vg = new Vaga();
                    $result1 = $ib->executarSQL($vg->buscar("distinct cs_endereco, cs_numero, cs_codigo", array("cs_usuario" => $_SESSION['codigo_usuario'], "vg_situacao" => "E"), "", "cs_codigo", "casa"));
                    $nla = $ib->obterQtdeSQL($result1);
                    if ($nla != 0) {
                        while ($casa = $ib->obterDadosSQL($result1)) {
                            $result2 = $ib->executarSQL($vg->buscar("", array("vg_casa" => $casa['cs_codigo']), "E", "vg_tipo"));
                            $nlb = $ib->obterQtdeSQL($result2);
                            if ($nlb != 0) {
                                ?>
                                <div class='tablediv'>
                                    <h3 style="cursor:pointer" onclick="javascript: window.location.href = 'visualizar.php?tipo=CS&cod=<?= $casa['cs_codigo'] ?>'"><?= strtoupper(normalizarString($casa['cs_endereco'] . ", " . $casa['cs_numero'])) ?></h3>


                                    <table border="1" class='tabela1'>
                                        <thead><tr>

                                                <th width="30%">Tipo</th>
                                                <th width="30%">Tamanho</th>
                                                <th width="20%">Valor/15m</th>
                                                <th width="20%">Opções</th>
                                            </tr></thead>
            <?php
            while ($vaga = $ib->obterDadosSQL($result2)) {
                ?>
                                            <tbody><tr>
                <?php
                switch ($vaga['vg_tipo']) {
                    case "C":
                        $tipo = "Com cobertura";
                    case "S":
                        $tipo = "Sem Cobertura";
                }

                switch ($vaga['vg_tamanho']) {
                    case "P":
                        $tamanho = "Pequena";
                    case "M":
                        $tamanho = "Media";
                    case "G":
                        $tamanho = "Grande";
                }
                ?>
                                                    <td><?= $tipo ?></td>
                                                    <td><?= $tamanho ?></td>
                                                    <td><?= "R$" . number_format($vaga['vg_valorinicial'], 2, ',', '.') ?></td>
                                                    <td>
                                                        <a href="javascript: validaRestaurar('<?= $vaga['vg_codigo'] ?>', 'VG');" title="Restaurar"><img src="img/restaurar.png" width="<?= $wdt ?>" height="<?= $hdt ?>"/></a>

                                                    </td>
                                                </tr></tbody>

                                                <?php }
                                                ?>
                                    </table> </div> 
                                <br><br> 
            <?php
        }
    }
    ?> 
    <?php
} else {
    echo "<div align='center'><p>Não há Vagas Excluidas</p>"
    
    . "</div>";
}
?>
                </div></div><div id="SV" style="display:none">   
                   
                <div class="container1">    
                    <?php
                    $sv = new Servico();
                    $result1 = $ib->executarSQL($sv->buscar("sv_codigo, cs_endereco, vg_descricao, cs_numero, vc_marca, vc_modelo, sv_datainicial, sv_datafinal, sv_valortotal, sv_situacao", array("sv_usuario" => $_SESSION['codigo_usuario']), "E", "sv_codigo", array("vaga", "casa", "veiculo")));
                    $nl = $ib->obterQtdeSQL($result1);
                    if ($nl != 0) {
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
                        while ($serv = $ib->obterDadosSQL($result1)) {

                            switch ($serv['sv_situacao']) {
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
                                            <td><?= $serv['sv_codigo'] ?></td>
                                            <td><?= $serv['cs_endereco'] . " - " . $serv['cs_numero'] ?></td>
                                            <td><?= $serv['vg_descricao'] ?></td>
                                            <td><?= $serv['vc_marca'] . " - " . $serv['vc_modelo'] ?></td>
                                            <td><?= formatar_data_barras($serv['sv_datainicial'], "dd/mm/yyyy") . " " . substr(obter_sohora($serv['sv_datainicial']), 0, 5) ?></td>
                                            <td><?= formatar_data_barras($serv['sv_datafinal'], "dd/mm/yyyy") . " " . substr(obter_sohora($serv['sv_datafinal']), 0, 5) ?></td>
                                            <td><?= "R$" . number_format($serv['sv_valortotal'], 2, ",", ".") ?></td>
                                            <td><?= $situacao ?></td>
                                            <td>
                                                <a href="javascript: validaRestaurar('<?= $serv['sv_codigo'] ?>','SV');" title="Restaurar"><img src="img/restaurar.png" width="<?= $wdt ?>" height="<?= $hdt ?>"/></a>

                                            </td>
                                        </tr></tbody>

                                <?php }
                                ?>
                            </table>  </div> 
                        
    <?php
} else {
    echo "<div align='center'><p>Não há Serviços Excluidos</p>"
    
    . "</div>";
}
?></div>
            </div>
            <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href = "principal.php"'></p>
<?php
$ib->fecharBanco();
?>
        </div>
    </div>
</body>
</html>