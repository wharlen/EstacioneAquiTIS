<?php
    // session_start inicia a sessão
    session_start();
    // as variáveis login e senha recebem os dados digitados na página anterior
    //echo "pagina acessada";
    include "includes/funcoes.php";
    
    if(isset($_POST['login'])) $login = strtolower(normalizarString($_POST['login']));
    elseif(isset($_GET['login'])) $login = $_GET['login'];
    
    if(isset($_POST['senha'])) $senha = md5($_POST['senha']);
    elseif(isset($_GET['senha'])) $senha = $_GET['senha'];
    // as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
    $con = mysql_connect("localhost", "root", "") or die ("Sem conexão com o servidor");
    $select = mysql_select_db("estacionebd") or die("Sem acesso ao DB");

    // A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
    $result = mysql_query("SELECT * FROM USUARIO WHERE us_login = '$login' AND us_senha = '$senha' and (us_status != 'E' or us_status != 'I') ");
    // Caso o prazo da casa expire, ela é bloqueada
    mysql_query("UPDATE CASA SET cs_bloqueado = 'S' WHERE cs_bloqueado != 'S' AND cs_datalimite < '".date("Y-m-d")."'");
    
    /* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, 
     * ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, 
     * se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina principal.php 
     * ou retornara  para a login.php para que se possa tentar novamente realizar o login */
    if(mysql_num_rows ($result) > 0 ){
        //echo "passou aqui";exit;
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        
        $usuario = mysql_fetch_array($result);
        
        $_SESSION['codigo_usuario'] = $usuario['us_codigo'];
        $_SESSION['nome_usuario'] = $usuario['us_nome'];
        
        mysql_close($con);
        
        header('location:principal.php');exit;
    }
    else{
        //echo "Usuario errado";exit;
        unset ($_SESSION);
        
        mysql_close($con);
        
        header('location:mensagens.php?m=2');exit;

    }

?>

