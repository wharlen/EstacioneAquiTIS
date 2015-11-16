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

 $cs = new Casa();
$result = $ib->executarSQL($cs->buscar("",array("cs_usuario"=>$_SESSION['codigo_usuario'], "cs_bloqueado"=>"!S"),"!E","cs_cidade"));
 $nl = $ib->obterQtdeSQL($result);

$i = 0;

$lastx = array('pontos' => array());

while($casa = $ib->obterDadosSQL($result))
{
  $lastx['pontos'][$i]['cs_codigo']   = $casa['cs_codigo'];
  $lastx['pontos'][$i]['cs_cep']   = $casa['cs_cep'];
  $lastx['pontos'][$i]['cs_endereco'] = $casa['cs_endereco'];
  $lastx['pontos'][$i]['cs_numero'] = $casa['cs_numero'];
  $lastx['pontos'][$i]['cs_bairro'] = $casa['cs_bairro'];
  $lastx['pontos'][$i]['cs_seguro'] = $casa['cs_seguro'];
  $lastx['pontos'][$i]['cs_animal'] = $casa['cs_animal'];
  $lastx['pontos'][$i]['cs_latitude'] = $casa['cs_latitude'];
  $lastx['pontos'][$i]['cs_longitude'] = $casa['cs_longitude'];

  $i++;
}

// json_encode é função mais importante e faz parte do Core PHP 5.x
$JSON = json_encode($lastx);
print_r($JSON);
?>