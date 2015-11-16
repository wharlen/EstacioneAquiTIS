 <div class="header-navigation">
            <div class="container">
                <div class="row">
                    <ul class="header-nav nav nav-pills">
    <li class="menuparent">
        <a href="index.php">Home</a>
    </li>

    <li class="menuparent">
        <a href="#">Casa</a>
        <ul class="sub-menu">
        <li><a href="cadastro.php?tipo=CS">Cadastrar Casa</a></li>
        <li><a href="galeria.php?tipo=CS">Galeria de Casas</a></li>
        <li><a href="renovar_casa.php">Renovar Pacote de Casa</a></li>
        </ul>
    </li>

    <li class="menuparent">
        <a href="#">Veiculos</a>
        <ul class="sub-menu">
            <li><a href="cadastro.php?tipo=VC">Adicionar Veiculos</a></li>
            <li><a href="galeria.php?tipo=VC">Galeria de Veiculos</a></li>
        </ul>
    </li>

    <li class="menuparent">
        <a href="#">Vagas</a>
        <ul class="sub-menu">
                <li><a href="cadastro.php?tipo=VG">Adicionar Vagas</a></li>
                <li><a href="galeria.php?tipo=VG">Configurar Vagas</a></li>
                <li><a href="solicitacao.php">Solicitações Pendentes</a></li>
        </ul>
    </li>

    <li class="menuparent">
        <a href="#">Serviços</a>

        <ul class="sub-menu">
                <li><a href="procurar_vaga.php">Estacionar em uma Vaga</a></li>
                <li><a href="galeria.php?tipo=SV">Meus Serviços</a></li>
                <li><a href="ver_vagas.php?tipo=CS">Serviços de Clientes</a></li>
                <li><a href="mensagens.php?m=23">Rotas de Acesso</a></li>
                <li><a href="enquete.php">Enquete de Satisfação</a></li>
                <li><a href="fechamento.php">Fechar Serviço</a></li></ul>             
    </li>
      <?php if(isset($_SESSION['login'])): ?>
    <li class="menuparent">
      
        <a href="#">Opçoes</a>
        <ul class="sub-menu">
                <li><a href="edicao.php?tipo=US&cod=<?php echo $_SESSION['codigo_usuario'];?>">Configuraçoes do Usuario</a></li>
                <li><a href="lixeira.php">Abrir Lixeira</a></li>
                <li><a href="mensagens.php?m=23">Desativar Conta</a></li>
                <li><a href="sair.php?sair=1">Sair</a></li></ul>
    </li>
    <?php endif;?>
<li class="menuparent"><a href="">Contato</li></a>
<li class="menuparent"><a href="">Sobre</li></a>
</ul><!-- /.header-nav -->
                    <div class="form-search-wrapper col-sm-3">
                        <form method="post" action="?" class="form-horizontal form-search">
                            <div class="form-group has-feedback no-margin">
                                <input type="text" class="form-control" placeholder="Search">

                                <span class="form-control-feedback">
                                    <i class="fa fa-search"></i>
                                </span><!-- /.form-control-feedback -->
                            </div><!-- /.form-group -->
                        </form>
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.header-navigation -->