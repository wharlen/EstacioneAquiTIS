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
<?php

$vg = new Vaga();  

$cs = new Casa();
//TIRADO DA QUERY "cs_usuario"=>$_SESSION['codigo_usuario'],
if(isset($_SESSION['codigo_usuario']))
$result = $ib->executarSQL($cs->buscar("",array("cs_usuario"=>"!".$_SESSION['codigo_usuario'],"cs_bloqueado"=>"!S"),"!E","cs_cidade"));
else
$result = $ib->executarSQL($cs->buscar("",array("cs_bloqueado"=>"!S"),"!E","cs_cidade"));

$nl = $ib->obterQtdeSQL($result);
$i = 0;

$lastx = array('pontos' => array());

while($casa = $ib->obterDadosSQL($result))
{
    //buscancando quant de vagas para cada casa
    $dado = array("vg_casa"=>$casa['cs_codigo'],
                  "vg_bloqueado"=>'N',
                  "vg_status"=>'A');
    $resultv = $ib->executarSQL($vg->buscar("vg_codigo",$dado,""));
    $nv = $ib->obterQtdeSQL($resultv);

  //criando array de dados JSON
  $lastx['pontos'][$i]['cs_codigo']   = $casa['cs_codigo'];
  $lastx['pontos'][$i]['cs_cep']   = $casa['cs_cep'];
  $lastx['pontos'][$i]['cs_endereco'] = $casa['cs_endereco'];
  $lastx['pontos'][$i]['cs_numero'] = $casa['cs_numero'];
  $lastx['pontos'][$i]['cs_bairro'] = $casa['cs_bairro'];
  $lastx['pontos'][$i]['cs_seguro'] = $casa['cs_seguro'];
  $lastx['pontos'][$i]['cs_animal'] = $casa['cs_animal'];
  $lastx['pontos'][$i]['cs_latitude'] = $casa['cs_latitude'];
  $lastx['pontos'][$i]['cs_longitude'] = $casa['cs_longitude'];
  $lastx['pontos'][$i]['qtd_vagas'] = $nv;
  $i++;
 
}

// json_encode é função mais importante e faz parte do Core PHP 5.x
$JSON = json_encode($lastx);
print_r($JSON);
?>  
<?php $ib->fecharBanco(); ?>