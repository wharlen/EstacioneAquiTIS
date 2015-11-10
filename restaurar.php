<?php
//ARQUIVO QUE SERVE PARA RESTAURAR UM CADASTRO QUE JÁ FOI EXCLUIDO

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
        //Caso o codigo foi recuperado, o arquivo é restaurado
        if(isset($codigo)){
            $ib->executarSQL($us->editar(array(
               "us_status"=>"A" 
            ),$codigo));
            header("location: mensagens.php?m=20&t=US");exit;
        }
        
        //Veiculo
    }elseif ($opcao == "VC") {
        
        $vc = new Veiculo();
        if(isset($codigo)){
            $ib->executarSQL($vc->editar(array(
               "vc_status"=>"A" 
            ),$codigo));
            header("location: mensagens.php?m=20&t=VC");exit;
        }
        
        //Casa
    }elseif ($opcao == "CS") {
        $cs = new Casa();
        if(isset($codigo)){
            $ib->executarSQL($cs->editar(array(
               "cs_status"=>"A" 
            ),$codigo));
            header("location: mensagens.php?m=20&t=CS");exit;
        }
        
        //Vaga
    }elseif ($opcao == "VG") {
        $vg = new Vaga();
        if(isset($codigo)){
            $ib->executarSQL($vg->editar(array(
               "vg_status"=>"A" 
            ),$codigo));
            header("location: mensagens.php?m=20&t=VG");exit;
        }
    }
} else {
    echo "Processo barrado, pois nao foi enviado nenhum dado.";
}

$ib->fecharBanco();


