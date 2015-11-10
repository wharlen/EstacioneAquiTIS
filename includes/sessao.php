<?php //esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. 
         session_start();
         
         if(isset($_GET['sair'])){
             unset($_SESSION['login']); 
             unset($_SESSION['senha']); 
             header('location:index.php');exit;
         }
         
         if(!isset($_SESSION['login'])){
            header("location: mensagens.php?m=1");exit;
         }
         
         
         
         if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){ 
             unset($_SESSION['login']); 
             unset($_SESSION['senha']);
             echo "Acesso Negado! Deve-se logar no sistema!";
             ?>
             <a href="index.php">voltar</a>
             
            <?php
             exit; 
         
         } 
         $logado = $_SESSION['login']; 
?>
         
