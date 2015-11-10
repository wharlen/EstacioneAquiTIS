<?php
//ARQUIVO QUE SERVE PARA ATUALIZAR DADOS JÁ CADASTRADOS


//Adicionar arquivo de sessão
require "includes/sessao.php";
//Adicionar arquivo de conexão ao banco
require "includes/database.php";
//Adicionar arquivo com as entidades/classes
require "includes/modelo.php";
//Adicionar arquivo de funçoes auxiliares
include "includes/funcoes.php";
//buscando dados enviados
$opcao = $_GET['tipo'];

//Verificando se há dados enviados
if (isset($_POST)) {
    //Usuario
    if ($opcao == "US") {

        $us = new Usuario();

        $rg = strtoupper(normalizarString($_POST['rg']));

        $result = $ib->executarSQL($us->buscar("us_rg ", "where us_rg = '" . $_POST['rg'] . "' and us_codigo != '" . $_SESSION['codigo_usuario'] . "' ", "sql"));
        $nl = $ib->obterQtdeSQL($result);

        if ($nl != 0) {
            while ($usuarios = $ib->obterDadosSQL($result)) {
                if ($rg == $usuarios['us_rg']) {
                    header("location: mensagens.php?m=11");
                    exit;
                }
            }
        }


        try {
            $us->setCodigo($_SESSION['codigo_usuario']);
            $us->setNome($_POST['nome']);
            $us->setSexo($_POST['sexo']);
            $us->setDataNascimento(formatar_data_tracos($_POST['nascimento'], "yyyy-mm-dd"));
            $us->setTelefone($_POST['telefone']);
            $us->setRg($rg);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");
            exit;
        }
        //Atualizando dados do banco: na tabela "usuario"
        $ib->executarSQL($us->editar(array(
                    "us_nome" => $us->getNome(),
                    "us_sexo" => $us->getSexo(),
                    "us_datanascimento" => $us->getDataNascimento(),
                    "us_telefone" => $us->getTelefone(),
                    "us_rg" => $us->getRg()
                        ), $us->getCodigo()));
        header("location: mensagens.php?m=17&t=US");
        exit;
        //Veiculo
    } elseif ($opcao == "VC") {

        $vc = new Veiculo();
        try {
            $vc->setCodigo($_POST['codigo']);
            $vc->setMarca($_POST['marca']);
            $vc->setModelo($_POST['modelo']);
            $vc->setCor($_POST['cor']);
            $vc->setAno($_POST['ano']);
            $vc->setCarroceria($_POST['carroceria']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");
            exit;
        }
        $ib->executarSQL($vc->editar(array(
                    "vc_marca" => $vc->getMarca(),
                    "vc_modelo" => $vc->getModelo(),
                    "vc_cor" => $vc->getCor(),
                    "vc_ano" => $vc->getAno(),
                    "vc_carroceria" => $vc->getCarroceria()
                        ), $vc->getCodigo()));
        header("location: mensagens.php?m=17&t=VC");
        exit;
        //Casa  
    } elseif ($opcao == "CS") {


        try {
            $cs = new Casa();
            $cs->setCep($_POST['cep']);
            $cs->setEndereco($_POST['endereco']);
            $cs->setNumero($_POST['numero']);
            $cs->setBairro($_POST['bairro']);
            $cs->setCidade($_POST['cidade']);
            $cs->setEstado($_POST['estado']);
            $cs->setSeguro($_POST['seguro']);
            $cs->setAnimal($_POST['animal']);
            $cs->setCodigo($_POST['codigo']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");
            exit;
        }
        $ib->executarSQL($cs->editar(array(
                    "cs_cep" => $cs->getCep(),
                    "cs_endereco" => $cs->getEndereco(),
                    "cs_numero" => $cs->getNumero(),
                    "cs_bairro" => $cs->getBairro(),
                    "cs_cidade" => $cs->getCidade(),
                    "cs_estado" => $cs->getEstado(),
                    "cs_seguro" => $cs->getSeguro(),
                    "cs_animal" => $cs->getAnimal()
                        ), $cs->getCodigo()));
        header("location: mensagens.php?m=17&t=CS");
        exit;
        //Vaga
    } elseif ($opcao == "VG") {
        try {
            $vg = new Vaga();
            $vg->setDescricao($_POST['descricao']);
            $vg->setTipo($_POST['tipo']);
            $vg->setTamanho($_POST['tamanho']);
            $vg->setValorInicial(number_format($_POST['valor'], 2, '.', ','));
            $vg->setCodigo($_POST['codigo']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");
            exit;
        }
        $ib->executarSQL($vg->editar(array(
                    "vg_descricao" => $vg->getDescricao(),
                    "vg_tipo" => $vg->getTipo(),
                    "vg_tamanho" => $vg->getTamanho(),
                    "vg_valorinicial" => $vg->getValorInicial()
                        ), $vg->getCodigo()));
        header("location: mensagens.php?m=17&t=VG");
        exit;

        //Fechamento de Serviço
    } elseif ($opcao == "SVF") {
        try {
            $sv = new Servico();
            $sv->setTipoPagamento($_POST['pagamento']);
            $sv->setObservacao($_POST['observacao']);
            $sv->setCodigo($_POST['codigo']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");
            exit;
        }
        $ib->executarSQL($sv->editar(array(
                    "sv_tipopagamento" => $sv->getTipoPagamento(),
                    "sv_observacao" => $sv->getObservacao(),
                    "sv_situacao" => "F"
                        ), $sv->getCodigo()));
        header("location: mensagens.php?m=22&cod=" . $sv->getCodigo());
        exit;
    }
    
    //Caso não haja dados ou o arquivo é aberto manualmente
} else {
    echo "Processo barrado, pois nao foi enviado nenhum dado.";
}
//Encerrando Conexão ao Banco
$ib->fecharBanco();


