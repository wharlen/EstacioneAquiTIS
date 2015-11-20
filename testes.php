<?php

  require "includes/database.php";
  require "includes/modelo.php";
  require "includes/sessao.php";
  include "includes/funcoes.php";

  //$sv = new Servico();
  //$result1 = $ib->executarSQL($vg->buscar("distinct cs_endereco, cs_codigo ",array("cs_usuario"=>$_SESSION['codigo_usuario']),"!E","cs_codigo"));
  //$nla = $ib->obterQtdeSQL($result1);
  //

  //echo substr("12345",0,-2);
  
  //echo $sv->buscar("","3","","",array("veiculo","vaga","casa","usuario p"));
  //echo $vg->buscar("distinct cs_endereco, cs_codigo, us_nome",
  //                  "where vg_situacao != 'O' and vg_bloqueado = 'N' and cs_bloqueado = 'N' and ".
  //                  "cs_usuario != '1' and vg_situacao != 'E' ","sql","cs_codigo",array("casa","usuario"));
  //echo substr("!ea",0,1);
  //echo($vg->buscar("vg_veiculo","12"));
  //include "includes/js-jquery.php"; 
/*echo $sv->buscar("sv_codigo",
                    "where ((sv_datainicial <= '2015-11-18 21:00' and sv_datafinal >= '2015-11-18 21:00') or (sv_datainicial >= '2015-11-18 21:00' and sv_datainicial >= '2015-11-20 21:00') "
                    . "or sv_datainicial = '2015-11-18 21:00' or sv_datafinal = '2015-11-18 21:00') and sv_vaga = '1' and sv_status != 'E' ","sql");
*/


 $sv = new Servico();
            $nsp = $ib->obterQtdeSQL($sv->buscar("sv_codigo, sv_datainicial, sv_veiculo, sv_vaga, vg_descricao, vc_marca, vc_modelo, c.us_nome, c.us_telefone, cs_endereco, cs_numero ", array("sv_situacao" => "P", "cs_usuario" => $_SESSION['codigo_usuario']), "!E", "sv_datainicial", array("veiculo", "vaga", "casa", "usuario c")));
            
echo $nsp;
?>

