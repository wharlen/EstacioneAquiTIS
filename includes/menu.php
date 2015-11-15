<?php 
//ARQUIVO QUE seve para exibição do menu, e seus submenus em uma interface

if (isset($_SESSION['login'])){?>

<!--Menu no sistema logado-->
<br>
<div align="center" class="divmenu" >
    
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Estacione<img src="">Aqui</a>
    </div>
        <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="principal.php">Home</a></li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Casa
            <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="cadastro.php?tipo=CS">Cadastrar Casa</a></li>
                <li><a href="galeria.php?tipo=CS">Galeria de Casas</a></li>
                <li><a href="renovar_casa.php">Renovar Pacote de Casa</a></li>
            </ul></li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Veiculo
            <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="cadastro.php?tipo=VC">Adicionar Veiculos</a></li>
                <li><a href="galeria.php?tipo=VC">Galeria de Veiculos</a></li>
            </ul></li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Vagas
            <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="cadastro.php?tipo=VG">Adicionar Vagas</a></li>
                <li><a href="galeria.php?tipo=VG">Configurar Vagas</a></li>
                <li><a href="solicitacao.php">Solicitações Pendentes</a></li>
            </ul></li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Serviços
            <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="procurar_vaga.php">Estacionar em uma Vaga</a></li>
                <li><a href="galeria.php?tipo=SV">Meus Serviços</a></li>
                <li><a href="ver_vagas.php?tipo=CS">Serviços de Clientes</a></li>
                <li><a href="mensagens.php?m=23">Rotas de Acesso</a></li>
                <li><a href="enquete.php">Enquete de Satisfação</a></li>
                <li><a href="fechamento.php">Fechar Serviço</a></li></ul>
            </li>

            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Opções
            <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="edicao.php?tipo=US&cod=<?=$_SESSION['codigo_usuario']?>">Configuraçoes do Usuario</a></li>
                <li><a href="lixeira.php">Abrir Lixeira</a></li>
                <li><a href="mensagens.php?m=23">Desativar Conta</a></li>
                <li><a href="sair.php?sair=1">Sair</a></li></ul>
            </li>
            <li><a href='#'>Contato</a></li>
            <li><a href='#'>Sobre</a></li>

        </ul>
    </div>
    </div>
</nav> 

</div><br><br><br>
<?php }else{ ?>
<!--Menu no sistema deslogado-->
<br>
<div align="center" class="divmenu">
    
<nav>
    <ul class="menu" >
        <li><a href="login.php">Home</a></li>
        <li><a href='cadastro.php?tipo=US'>Cadastre-se</a></li>
        <li><a href='#'>Contato</a></li>
        <li><a href='#'>Sobre</a></li>
    </ul>
</nav>        
</div><br><br><br>
<?php } ?>
