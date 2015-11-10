<?php
//ARQUIVO QUE SERVE PARA EXCLUIR UM CADASTRO

//Adicionar arquivo de sessão
require "includes/sessao.php";
//Adicionar arquivo de conexão ao banco
require "includes/database.php";
//Adicionar arquivo com as entidades/classes
require "includes/modelo.php";
//Adicionar arquivo de funçoes auxiliares
include "includes/funcoes.php";
//buscando dados enviados
$opcao = $_GET['t'];

//Caso exista um dado 'cod'
isset($_GET['cod']) and $codigo = $_GET['cod'];

//Verificando se há dados enviados
if (isset($_POST)) {
    //Usuario
    if ($opcao == "US") {
        
        $us = new Usuario();
        
        if(isset($codigo)){
            //Excluindo um usuario
            $ib->executarSQL($us->editar(array(
               "us_status"=>"E" 
            ),$codigo));
            header("location: mensagens.php?m=19&t=US");exit;
        }
        
    //Veiculo    
    }elseif ($opcao == "VC") {
        
        $vc = new Veiculo();
        if(isset($codigo)){
            //Excluindo um veiculo
            $ib->executarSQL($vc->editar(array(
               "vc_status"=>"E" 
            ),$codigo));
            header("location: mensagens.php?m=19&t=VC");exit;
        }
    //Casa 
    }elseif ($opcao == "CS") {
        $cs = new Casa();
        if(isset($codigo)){
            //Excluindo uma casa
            $ib->executarSQL($cs->editar(array(
               "cs_status"=>"E" 
            ),$codigo));
            header("location: mensagens.php?m=19&t=CS");exit;
        }
        
    //Vaga
    }elseif ($opcao == "VG") {
        $vg = new Vaga();
        if(isset($codigo)){
            //Excluindo uma vaga
            $ib->executarSQL($vg->editar(array(
               "vg_status"=>"E" 
            ),$codigo));
            header("location: mensagens.php?m=19&t=VG");exit;
        }
    }
} else {
    echo "Processo barrado, pois nao foi enviado nenhum dado.";
}

$ib->fecharBanco();


