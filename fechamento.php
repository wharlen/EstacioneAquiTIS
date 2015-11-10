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
        
    </head>
    <body>
        <div align="center">
            <?php
            //Incluindo arquivo de menus
            include "includes/menu.php";
            
            ?>
            <div>
                
                <?php
                if(isset($_GET["c"])){
                    $botaovoltar =  input_form("button", "","","Voltar",array("onclick"=>"window.location.href='index.php'",
                "class" => "botao01","style" => "margin:auto"));  
            
                 ?> <!--Formulário de Fechamento-->  
                <h3 class="titulo1">Informe os dados:</h3>
            <div class="container1">
                <?php
                    $sv = new Servico();
                    $svpag = $ib->obterDadosSQL($ib->executarSQL($sv->buscar("sv_valortotal",$_GET['c'])));
                
                
                ?>
                <?= abrir_form("post", "fechamento", "atualizar.php?tipo=SVF")?>
                <table>
                    <tr><td colspan="2">Valor do Pagamento: R$ <?=number_format($svpag['sv_valortotal'],2,",",".")?></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>Tipo de Pagamento:</td><td>
                    <?= input_form("radio", "pagamento","","D","checked")?>Dinheiro&nbsp;
                    <?= input_form("radio", "pagamento","","C")?>Cartão</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td style="font-weight: bold" colspan="2" >Observações (Informe o ocorrido durante o aluguel, como danos, entre outros): </td></tr><tr><td colspan="2">
                            <textarea cols="70" rows="10" onmouseup="updatePositionTxt(this)"
                        onmousedown="updatePositionTxt(this)"
                        onkeyup="updatePositionTxt(this)"
                        onkeydown="updatePositionTxt(this)"
                        onfocus="updatePositionTxt(this)" name="observacao" ></textarea></td></tr>
                    
                    <tr><td>&nbsp;<?= input_form("hidden", "codigo","",$_GET['c'])?></td></tr>
                    <tr><td><small>(<b>*</b>) Campos Obrigatórios</small></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td colspan="2"><?= input_form("submit", "","","Cadastrar",array("class" => "botao01","style" => "margin:auto"))?>&nbsp;<?=$botaovoltar?></td></tr>
                </table>
                <?= fecha_form() ?>
            </div>    
                <?php 
                }else{               
                ?>
                <h3 class='titulo1'>Fechando Serviços</h3>
                <div class="container1">
                
                <?php
                    $sv = new Servico();
                    $result = $ib->executarSQL($sv->buscar("sv_codigo, sv_datainicial, sv_datafinal, vg_descricao, vc_marca, vc_modelo, cs_endereco, cs_numero ", 
                            "where sv_situacao = 'A' and sv_usuario = ".$_SESSION['codigo_usuario'],
                            "sql", "sv_datainicial", 
                            array("veiculo", "vaga", "casa")));
                    $nl = $ib->obterQtdeSQL($result);
                    ?>
                    
                <div> 
                    <?php if ($nl != 0) { ?>
                    <!--Lista de serviços a serem fechados-->
                    <p>Qual de seus processos voce deseja encerrar?</p>
                            <table border="1" class="tabela1">
                                <thead>
                                    <tr>
                                        <th>Nº Serviço</th>
                                        <th>Vaga selecionada</th>
                                        <th>Veiculo</th>
                                        <th>Data Marcada</th>
                                        <th>Data de Entrega</th>
                                        <th>Opcoes</th>
                                    </tr>
                                </thead>
                                <tbody>

        <?php
        while ($dados = $ib->obterDadosSQL($result)) {
            ?>
                                        <tr>
                                            <td><?= $dados['sv_codigo'] ?></td>
                                            <td><?= $dados['vg_descricao'] . " - " . $dados['cs_endereco']." ".$dados['cs_numero'] ?></td>
                                            <td><?= $dados['vc_marca'] . " - " . $dados['vc_modelo'] ?></td>
                                            <td><?= formatar_data_barras($dados['sv_datainicial'],"dd/mm/yyyy") . " " . substr(obter_sohora($dados['sv_datainicial']), 0, 5) ?></td>
                                            <td><?= formatar_data_barras($dados['sv_datafinal'],"dd/mm/yyyy") . " " . substr(obter_sohora($dados['sv_datafinal']), 0, 5) ?></td>
                                            <td><a href="fechamento.php?c=<?= $dados['sv_codigo'] ?>">Selecionar</a></td>
                                        </tr>
        <?php } ?>
                                </tbody>
                            </table> 
                                <?php
                                
                                //Caso não haja serviços abertos
                                } else {
                                    echo "Não há serviços em abertos!";
                                }
                                ?>
                        <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href = "principal.php"'></p>
                    </div>
                </div>
                <?php } ?>
                
            </div>
            <?php 
            $ib->fecharBanco();
            
            ?>
        </div>
    </body>
</html>