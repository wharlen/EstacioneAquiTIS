<?php
//ARQUIVO QUE SERVE PARA GRAVAR OS CADASTROS FEITOS NO SISTEMA AO BANCO

//Todos os cadastros, exceto Usuario, terá a sessão verificada
if (isset($_GET["tipo"])) {
    if ($_GET['tipo'] != "US")
        //Adicionar arquivo de sessão
        require "includes/sessao.php";
}else {
    header("location: index.php");
    exit;
}
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
            $login = strtolower(normalizarString($_POST['login']));
            
            $result = $ib->executarSQL($us->buscar("us_cpf, us_rg, us_login ",
                    "where (us_cpf = '".$_POST['cpf']."' or us_rg = '".$_POST['rg']."' or us_login = '".$_POST['login']."') ",
                    "sql"));
            $nl = $ib->obterQtdeSQL($result);
            
            if($nl != 0){
                while($usuarios = $ib->obterDadosSQL($result)){
                    if($_POST['cpf'] == $usuarios['us_cpf']){
                        header("location: mensagens.php?m=10");exit;
                    }
                    if($rg == $usuarios['us_rg']){
                        header("location: mensagens.php?m=11");exit;
                    }
                    if($login == $usuarios['us_login']){
                        header("location: mensagens.php?m=12");exit;
                    }
                }
            }
            
        
        try {
            $us->setCpf($_POST['cpf']);
            $us->setNome($_POST['nome']);
            $us->setSexo($_POST['sexo']);
            $us->setDataNascimento(formatar_data_tracos($_POST['nascimento'], "yyyy-mm-dd"));
            $us->setTelefone($_POST['telefone']);
            $us->setRg($rg);
            $us->setLogin($login);
            $us->setSenha(md5($_POST['senha']));
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");exit;
        } 
        
        //Gravando os dados no banco para a tabela: USUARIO
        $ib->executarSQL($us->criar());
        header("location: mensagens.php?m=5&l=".$_POST['login']."&s=".md5($_POST['senha']));exit;
        //Veiculo
    }elseif ($opcao == "VC") {
        
        $placa = strtoupper($_POST['placa']);
        $vc = new Veiculo();
        $nl = $ib->obterQtdeSQL($ib->executarSQL($vc->buscar("vc_placa ",
                    array("vc_placa" => $placa))));
        if($nl != 0){
            header("location: mensagens.php?m=13");exit;
        }
        try {
            $vc->setMarca($_POST['marca']);
            $vc->setModelo($_POST['modelo']);
            $vc->setCor($_POST['cor']);
            $vc->setAno($_POST['ano']);
            $vc->setPlaca($placa);
            $vc->setCarroceria($_POST['carroceria']);
            $vc->setUsuario($_SESSION['codigo_usuario']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");exit;
        } 
        
        //Salvando os dados de Veiculo
        $ib->executarSQL($vc->criar());
        header("location: mensagens.php?m=6");exit;
        //Casa
    }elseif ($opcao == "CS") {
        
        //Adicionando data atual
        $dataCriacao = date("d/m/Y");
        
        //Tratando o valor e o prazo a partir do pacote escolhido
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
            
            //Criando data de vencimento para o pacote
            $dataLimite = SomarData($dataCriacao, $diasprazo);
            
            
        
            
        try {
            $cs = new Casa();
            $cs->setCep($_POST['cep']);
            $cs->setEndereco($_POST['endereco']);
            $cs->setNumero($_POST['numero']);
            $cs->setBairro($_POST['bairro']);
            $cs->setCidade($_POST['cidade']);
            $cs->setEstado($_POST['estado']);
            $cs->setDataCriacao(formatar_data_tracos($dataCriacao,"yyyy-mm-dd"));
            $cs->setDataLimite(formatar_data_tracos($dataLimite,"yyyy-mm-dd"));
            $cs->setSeguro($_POST['seguro']);
            $cs->setAnimal($_POST['animal']);
            $cs->setPacote($pacote);
            $cs->setUsuario($_SESSION['codigo_usuario']);
            $cs->setLatitude($_POST['latitude']);
            $cs->setLongitude($_POST['longitude']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");exit;
        } 
        
        //Salvando os dados da casa
        $ib->executarSQL($cs->criar());
        
        $fd = new Fundo();
        
        //aumentando o valor arrecadado no banco
        $ib->executarSQL($fd->aumentarValor($valor));
        
        header("location: mensagens.php?m=7");exit;
        //Vaga
    }elseif ($opcao == "VG") {
        try {
            $vg = new Vaga();
            $vg->setDescricao($_POST['descricao']);
            $vg->setTipo($_POST['tipo']);
            $vg->setTamanho($_POST['tamanho']);
            $vg->setValorInicial(number_format($_POST['valor'],2,'.',','));
            $vg->setCasa($_POST['casa']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");exit;
        } 
        
        //Salvando os dados da vaga
        $ib->executarSQL($vg->criar());
        header("location: mensagens.php?m=8");
        
        //Serviço
    }elseif ($opcao == "SV") {
        
        $data_ini = formatar_data_tracos($_POST['datai'], "YYYY-MM-DD")." ".$_POST['horai'];
        $data_fin = formatar_data_tracos($_POST['dataf'], "YYYY-MM-DD")." ".$_POST['horaf'];
        $vaga = $_POST['vaga'];
        $veiculo = $_POST['veiculo'];
        $sv = new Servico();
        $nl = $ib->obterQtdeSQL($ib->executarSQL($sv->buscar("sv_codigo",
                    "where ((sv_datainicial <= '$data_ini' and sv_datafinal >= '$data_ini') or (sv_datainicial >= '$data_ini' and sv_datainicial >= '$data_fin') "
                    . "or sv_datainicial = '$data_ini' or sv_datafinal = '$data_ini') and sv_vaga = '$vaga' and sv_status != 'E' ","sql")));
       
        //echo $arqvaga;exit;
        if($nl != 0){
            header("location: mensagens.php?m=14");exit;
        }
        
        $vg = new Vaga();
        $tamVaga = $ib->obterDadosSQL($ib->executarSQL($vg->buscar("vg_tamanho",$vaga,"!E")));
        $vc = new Veiculo();
        $tamVeiculo = $ib->obterDadosSQL($ib->executarSQL($vc->buscar("vc_tamanho",$veiculo,"!E")));
        
        $permissao = true;
        switch($tamVaga['vg']){
            case "P":
                $permissao = ($tamVeiculo['vc_tamanho'] != 'P'?false:true);
                break;
            case "M":
                $permissao = ($tamVeiculo['vc_tamanho'] = 'G'?false:true);
                break;
        }
        
        
        if(!$permissao){
            header("location: mensagens.php?m=21");exit;
        }
        
        try {
            $sv->setDataInicial($data_ini);
            $sv->setDataFinal($data_fin);
            $sv->setValorTotal($_POST['valortotal']);
            $sv->setVaga($vaga);
            $sv->setVeiculo($veiculo);
            $sv->setUsuario($_SESSION['codigo_usuario']);
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");exit;
        } 
        
        //Criando um Serviço
        $ib->executarSQL($sv->criar());
        header("location: mensagens.php?m=9");exit;
        
        //Satisfação (ENQUETE)
    }elseif ($opcao == "SF") {
        
        try {
            $sf = new Satisfacao();
            $sf->setProprietario($_POST['proprietario']);
            $sf->setCliente($_SESSION['codigo_usuario']);
            $sf->setNota($_POST['nota']);
        
        } catch (Exception $e) {
            header("location: mensagens.php?m=3");exit;
        }
        
        //Criando um resultado da enquete
        $ib->executarSQL($sf->criar());
        header("location: mensagens.php?m=15");exit;
    }
    
    //Caso não haja dados ou o arquivo é aberto manualmente
} else {
    echo "Processo barrado, pois nao foi enviado nenhum dado.";
}

$ib->fecharBanco();