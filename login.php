<!DOCTYPE html>
<?php
session_start();
if ((isset($_SESSION['login']) == true) and ( isset($_SESSION['senha']) == true)) {
    header('location:index.php');
    exit;
}

$con = mysql_connect("localhost", "root", "") or die("Sem conexão com o servidor");
$select = mysql_select_db("estacionebd") or die("Sem acesso ao DB");

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
mysql_query("UPDATE CASA SET cs_bloqueado = 'S' WHERE cs_bloqueado != 'S' AND cs_datalimite < '" . date("Y-m-d") . "'");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - ESTACIONEAQUI.COM</title>
        <?php include "includes/js-jquery.php" ?>
        <?php include "includes/css.php" ?>

    </head>
    <body>

        <div align="center" style="width:100%">
            <?php //include "includes/cabecalho.php" ?>
            <?php include "includes/menu.php" ?>

            <form method="post" action="criar_sessao.php" name="formlogin" onsubmit="return validaLogSenha(this);"> 
                <div align="center" style="width:50%">
                    <fieldset> 
                        <legend>Acessar</legend><br /> 
                        <table>
                            <tr>
                                <td><label>Login : </label></td> 
                                <td><input type="text" name="login"/>&nbsp;&nbsp;</td>
                                <td><label>Senha :</label></td>
                                <td><input type="password" name="senha" onkeypress="capLock(event);"/>&nbsp;&nbsp;</td>
                            <td colspan="2" style="text-align:center;"><input type="submit" value="LOGAR" class="botao01" style="margin:auto"/></td></tr>
                        </table>
                        <div id="capsLK" style="visibility:hidden"><span style="color: green">Caps Lock está ativado.</span></div> 
                        <div align="center" width="50%" border="1">
                            <small>Caso não possua cadastro: <a href="cadastro.php?tipo=US">Clique aqui</a></small>
                        </div>
                    </fieldset> 
                </div>

            </form>
            <br><br>
            <div class="container1">
                <h3>Você quer localizar uma vaga de estacionamento? </h3>
                <p>	<small>Veio ao lugar certo! Veja qual a opção abaixo 
                        é melhor para você.</small></p>

                <div>
                    <input type="checkbox" name="localizacao"> Marque aqui para buscar uma vaga mais proxima apartir da sua localização.

                    <h4 class="text-heroi"><strong>OU</strong></h4>

                    <p>Digite abaixo o endereço desejado</p>

                    <div class="text-center	 divbusca">
                        <form role="form" method="post" action="procurar_vaga.php">

                            <input type="text" name="researchv" class="form-contro" id="endereco" placeholder="Rua, nº, Bairro ou Cidade">
                            <button class="botao01" type="submit">Buscar</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>



    </body>
</html>
