<?php
    //incluindo arquivo de sessão
    //require "includes/sessao.php";
    //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";
?>
    <?php include"includes/header_site.php";

        //Incluindo arquivos para leitura de javascript e CSS
        include "includes/js-jquery.php"; 
        include "includes/css.php";  
        include "includes/maps.php";
        
        include"includes/cabec_site.php";?> 
<div id="main-wrapper">
   <div id="main">
        <div id="main-inner">
            <div class="container">
            	<div class="row">
            		<div class="col-sm-4">
                        <img src="img/" class="img-responsive">
            		</div>
            		<div class="col-sm-8">
<h2 class="center">TIS - GARAGEM COMPARTILHADA</h2>
<p class="block-slogan center">Aqui será um texto de explicação do Trabalho Interdisciplinar da turma de Sistemas de Informação da Faminas-BH 2015 - 6º e 4º períodos </p>
								</div>
							</div>                  
                  		</div>
                    </div>
                </div>
            </div>
            <?php include "includes/rodape.php";?>
        </div>
    </div>
     
</body>
</html>