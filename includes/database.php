<?php
    
    //incluindo as classes de interface para banco
    require "banco/interface_banco.php";
    require "banco/interface_sql.php";
    
    //Instanciando os objetos de manupulação no BD
    $ib = new InterfaceBanco();
    
    
    //Funções para conectar e selecionar banco
    $ib->conectaBanco();
    
    $ib->selecionarBanco();   
?>
    

