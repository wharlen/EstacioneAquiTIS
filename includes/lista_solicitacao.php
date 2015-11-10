<h3><?=$titles1?></h3>

                    <?php
                    $sv = new Servico();
                    $result = $ib->executarSQL($sv->buscar("sv_codigo, sv_datainicial, sv_datafinal, sv_veiculo, sv_vaga, vg_descricao, vc_marca, vc_modelo, c.us_nome, c.us_telefone, cs_endereco, cs_numero ", array("sv_situacao" => "P", "cs_usuario" => $_SESSION['codigo_usuario']), "!E", "sv_datainicial", array("veiculo", "vaga", "casa", "usuario c")));
                    $nl = $ib->obterQtdeSQL($result);
                    ?>
                    <div> 
                    <?php if ($nl != 0) { ?>
                        <h3><?=$titles2?></h3>
                            <table border="1" class="tabela1">
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
                                            <td><a href="solicitacao.php?o=1&vg=<?= $dados['sv_vaga'] ?>&vc=<?= $dados['sv_veiculo'] ?>&c=<?= $dados['sv_codigo'] ?>">Aceitar Aluguel</a>/<a href="solicitacao.php?o=2">Recusar Aluguel</a></td>

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