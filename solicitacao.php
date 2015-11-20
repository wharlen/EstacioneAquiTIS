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
    <?php include"includes/header_site.php";

        //Incluindo arquivos para leitura de javascript e CSS
        include "includes/js-jquery.php"; 
        include "includes/css.php";  
        include "includes/maps.php";
        
        include"includes/cabec_site.php";?> 

<div id="main-wrapper">
   <div id="main">
        <div id="main-inner">
            <div class="container">

                <?php
                if (isset($_GET['o'])) {

                    $sv = new Servico();

                    $sitAntiga = $ib->obterDadosSQL($ib->executarSQL($sv->buscar("sv_situacao", $_GET['c'])));
                    
                    //Mudando a situação atual do serviço caso o proprietário confirme ou cancele a solicitação do usuario
                    if ($sitAntiga['sv_situacao'] == "P") {
                        $situacao = "";
                        //Aceitar
                        if ($_GET['o'] == 1) {
                            $situacao = "A";
                            $vg = new Vaga();
                            $ib->executarSQL($vg->editar(array("sv_situacao" => $situacao), $_GET['c']));
                        //Cancelar
                        } elseif ($_GET['o'] == 2)
                            $situacao = "C";
                        if ($situacao != "" && $_GET['c'] != "")
                            $ib->executarSQL($sv->editar(array("sv_situacao" => $situacao), $_GET['c']));
                    }

                    header("Location: mensagens.php?m=16");
                    exit;
                }else {
                    //Tela principal de Solicitação
                    $titles1 = "Solicitações de Clientes";
                    
                    $titles2 = "";
                    
                    $linkvoltar = "<input type='button' value='Voltar' class='btn btn-default' style='margin:auto' onclick='javascript: window.location.href = ".'"principal.php"'."'>"
                    ?>
                    <h3 class="center"><?=$titles1?></h3>

                    <?php
                    $sv = new Servico();
                    $result = $ib->executarSQL($sv->buscar("sv_codigo, sv_datainicial, sv_veiculo, sv_vaga, vg_descricao, vc_marca, vc_modelo, c.us_nome, c.us_telefone, cs_endereco, cs_numero ", array("sv_situacao" => "P", "cs_usuario" => $_SESSION['codigo_usuario']), "!E", "sv_datainicial", array("veiculo", "vaga", "casa", "usuario c")));
                    $nl = $ib->obterQtdeSQL($result);
                    ?>
                    <div class="box"> 
                    <?php if ($nl != 0) { ?>
                        <h3><?=$titles2?></h3>
                        
                        <table class="table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="12%">Nº Serviço</th>
                                        <th width="17%">Vaga selecionada</th>
                                        <th width="17%">Cliente</th>
                                        <th width="11%">Telefone</th>
                                        <th width="17%">Veiculo</th>
                                        <th width="14%">Data Marcada</th>
                                        <th width="12%">Opcoes</th>
                                    </tr>
                                </thead>
                                <tbody>

        <?php
        while ($dados = $ib->obterDadosSQL($result)) {
            ?>
                                        <tr>
                                            <!--<td><?= var_dump($dados) ?></td>-->

                                            <td><?= $dados['sv_codigo'] ?></td>
                                            <td><?= $dados['vg_descricao'] . " - " . $dados['cs_endereco'] . " " . $dados['cs_numero'] ?></td>
                                            <td><?= $dados['us_nome'] ?></td>
                                            <td><?= $dados['us_telefone'] ?></td>
                                            <td><?= $dados['vc_marca'] . " - " . $dados['vc_modelo'] ?></td>
                                            <td><?= formatar_data_barras($dados['sv_datainicial'], "dd/mm/yyyy") . " " . substr(obter_sohora($dados['sv_datainicial']), 0, 5) ?></td>
                                            <td><a href="solicitacao.php?o=1&vg=<?= $dados['sv_vaga'] ?>&vc=<?= $dados['sv_veiculo'] ?>&c=<?= $dados['sv_codigo'] ?>" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span></a><a href="solicitacao.php?o=2" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-down"></span></a></td>

                                        </tr>
        <?php } ?>
                                </tbody>
                            </table> 
                                    <?php
                                } else {
                                    echo "Não há solicitações pendentes no momento!";
                                }
                                ?>
                        <p><?=$linkvoltar?></p>
                    </div>
                    <?php } ?>
            </div>
                <?php
                $ib->fecharBanco();
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

