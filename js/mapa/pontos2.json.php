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


while ($casa = $ib->obterDadosSQL($result));
{
   // utilizado para definir o array quando houver mais de 1 registro retornado.
   $i=0;
   foreach($casa as $key => $value)
   {
     if (is_string($key))
     {
       // Irá criar um array com o nome do campo 
       // como chave (Key) e o valor (Value).
       $fields[mysql_field_name($table,$i++)] = $value;
     }
   }

   // $json_result é o array que receberá 
   // os valores do array $fields
   // "bindings" é um nome que utilizei para dar nome ao objeto.
   // Você pode usar qualquer palavra.
   
   $json_result["marcadores"] [ ] =  $fields;

}

// json_encode é função mais importante e faz parte do Core PHP 5.x
$JSON = json_encode($json_result);

print_r($JSON);
?>