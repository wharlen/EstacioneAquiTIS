<?php 
//ARQUIVO QUE seve para exibição do menu, e seus submenus em uma interface

if (isset($_SESSION['login'])){?>

<!--Menu no sistema logado-->
<br>
<div align="center" class="divmenu" >
    
<nav>
    <ul class="menu" >
        <li><a href="principal.php">Home</a></li>
        <li><a href='#'>Casa</a>
        <ul>
            <li><a href="cadastro.php?tipo=CS">Cadastrar Casa</a></li>
            <li><a href="galeria.php?tipo=CS">Galeria de Casas</a></li>
            <li><a href="renovar_casa.php">Renovar Pacote de Casa</a></li>
        </ul></li>
        <li><a href='#'>Veiculo</a>
        <ul>
            <li><a href="cadastro.php?tipo=VC">Adicionar Veiculos</a></li>
            <li><a href="galeria.php?tipo=VC">Galeria de Veiculos</a></li>
        </ul></li>
        <li><a href='#'>Vagas</a>
        <ul>
            <li><a href="cadastro.php?tipo=VG">Adicionar Vagas</a></li>
            <li><a href="galeria.php?tipo=VG">Configurar Vagas</a></li>
            <li><a href="solicitacao.php">Solicitações Pendentes</a></li>
        </ul></li>
        <li><a href='#'>Serviços</a><ul>
            <li><a href="procurar_vaga.php">Estacionar em uma Vaga</a></li>
            <li><a href="galeria.php?tipo=SV">Meus Serviços</a></li>
            <li><a href="galeria.php?tipo=SVU">Serviços de Clientes</a></li>
            <li><a href="mensagens.php?m=23">Rotas de Acesso</a></li>
            <li><a href="enquete.php">Enquete de Satisfação</a></li>
            <li><a href="fechamento.php">Fechar Serviço</a></li></ul>
        </li>

        <li><a href='#'>Opcoes</a><ul>
            <li><a href="edicao.php?tipo=US&cod=<?=$_SESSION['codigo_usuario']?>">Configuraçoes do Usuario</a></li>
            <li><a href="lixeira.php">Abrir Lixeira</a></li>
            <li><a href="mensagens.php?m=23">Desativar Conta</a></li>
            <li><a href="sair.php?sair=1">Sair</a></li></ul>
        </li>
        <li><a href='#'>Contato</a></li>
        <li><a href='#'>Sobre</a></li>

    </ul>
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
