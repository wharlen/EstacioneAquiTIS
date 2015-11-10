<?php
//ARQUIVO QUE SERVE PARA EXIBIR UMA MENSAGEM OU ALERTA, A PARTIR DAS EXIGENCIAS DE CADA OPERAÇÃO

    //Arquivo de conexão ao banco
    require "includes/database.php";
    //Arquivo de modelo de dados
    require "includes/modelo.php";
    //Arquivo de funçoes auxiliares
    include "includes/funcoes.php";
    //Arquivo de Titulo da pagina
    include "includes/configsys.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        
        
        <title><?=$titulosys?></title>
        <?php 
        //Incluindo arquivos para leitura de javascrript e CSS
              include "includes/js-jquery.php"; 
              include "includes/css.php"; 
        ?>
        
       
    </head>
    <body>
        <!--Conteudo principal-->
        <div align="center" >
            <br><br><br>
            <div  style="display:block; border:3px solid black;  width:50%; margin: auto"><p>
                <?php
                
                //Inicializando as principais variaveis
                $link1 = "";
                $botao1 = "";
                $submit = "";
                $forms = "";
                
                    //A mensagem é chamada devido a sua numeração dada em um link
                    if(isset($_GET)){
                        if($_GET['m'] == 1){
                            echo "Você não está logado no sistema,<br>Faça logon ou cadastre-se!<br>";
                            $link1 = "location.href='login.php'";
                            $botao1 = "OK";
                            
                        }elseif($_GET['m'] == 2){
                            echo "Login ou Senha Incorretos!<br>";
                            $link1 = "location.href='login.php'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 3){
                            echo "Erro de Exception. o processo foi interrompido.<br>";
                            if($_GET['op'] == "US"){
                                $link1 = "location.href='cadastro.php?tipo=US'";
                            }else{
                                $link1 = "location.href='index.php'";
                            }
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 4){
                            
                        }elseif($_GET['m'] == 5){
                            echo "Seu cadastro foi feito com sucesso.<br>Você será redirecionado!<br>";
                            $link1 = "location.href='criar_sessao.php?login=".$_GET['l']."&senha=".$_GET['s']."'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 6){
                            echo "Veiculo cadastrado com sucesso.<br>";
                            $link1 = "location.href='galeria.php?tipo=VC'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 7){
                            echo "Casa cadastrada com sucesso.<br>";
                            $link1 = "location.href='galeria.php?tipo=CS'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 8){
                            echo "Vaga cadastrada com sucesso.<br>";
                            $link1 = "location.href='galeria.php?tipo=VG'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 9){
                            echo "Seu pedido de aluguel foi feito com sucesso.<br>Confirme com o proprietário ligando para seu numero.<br>";
                            $link1 = "location.href='galeria.php?tipo=SV'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 10){
                            echo "CPF já existe no sistema!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 11){
                            echo "RG já existe no sistema!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 12){
                            echo "Login já cadastrado no sistema!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 13){
                            echo "Já existe veiculo com a placa inserida!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 14){
                            echo "Vaga já está ocupada neste horário!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 15){
                            echo "Sua resposta foi salva com sucesso!<br>Obrigado pela participação!<br>";
                            $link1 = "location.href='principal.php'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 16){
                            echo "Permissao Obtida com sucesso!<br>";
                            $link1 = "location.href='principal.php'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 17){
                            
                            echo "Edição feita com sucesso!<br>";
                            
                            switch($_GET['t']){
                                case "US":
                                    $pagn = "principal.php";
                                    break;
                                case "VC":
                                    $pagn = "galeria.php?tipo=VC";
                                    break;
                                case "CS":
                                    $pagn = "galeria.php?tipo=CS";
                                    break;
                                case "VG":
                                    $pagn = "galeria.php?tipo=VG";
                                    break;
                               
                            }
                            $link1 = "location.href='$pagn'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 18){
                            echo "Cadastro renovado com sucesso!<br>";
                            $link1 = "location.href='principal.php'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 19){
                            switch($_GET['t']){
                                case 'US':
                                    $tipo = "Usuario";
                                    $letra = "o";
                                    break;
                                case 'VC':
                                    $tipo = "Veiculo";
                                    $letra = "o";
                                    break;
                                case 'CS':
                                    $tipo = "Casa";
                                    $letra = "a";
                                    break;
                                case 'VG':
                                    $tipo = "Vaga";
                                    $letra = "a";
                                    break;
                            }
                            
                            echo "$tipo excluid$letra com sucesso!<br>";
                            $link1 = "location.href='galeria.php?tipo=".$_GET['t']."'";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 20){
                            switch($_GET['t']){
                                case 'US':
                                    $tipo = "Usuario";
                                    $letra = "o";
                                    break;
                                case 'VC':
                                    $tipo = "Veiculo";
                                    $letra = "o";
                                    break;
                                case 'CS':
                                    $tipo = "Casa";
                                    $letra = "a";
                                    break;
                                case 'VG':
                                    $tipo = "Vaga";
                                    $letra = "a";
                                    break;
                            }
                            
                            echo "$tipo restaurad$letra com sucesso!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "OK";
                        }elseif($_GET['m'] == 21){
                            echo "O tamanho do carro é maior que o tamanho da garagem!<br>";
                            $link1 = "history.go(-1)";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 22){
                            $cod = $_GET['cod'];
                            
                            echo "Seu serviço já foi finalizado!<br>";
                            $link1 = "location.href='visualizar.php?tipo=SV&cod=$cod'";
                            $botao1 = "Voltar";
                        }elseif($_GET['m'] == 23){
                            echo "Pagina em construção!<br>";
                            $link1 = "location.href='index.php'";
                            $botao1 = "Voltar";
                        }   
                    }
                    else{
                            
                    }
                ?>
            </p>
            
            <?php
            if($botao1 != ""){
                ?>
            <input type="button" class="botao01" value="<?=$botao1?>" onclick="javascript: window.<?=$link1?>"/>
            <?php
            }
            //Fechando banco de dados
            $ib->fecharBanco();
            ?>
            <br><br>
            </div>
        </div>
    </body>
</html>