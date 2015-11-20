    <?php 
    require "includes/sessao.php";
     //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";?>
    <?php include"includes/header_site.php";
        include"includes/cabec_site.php";?>

<div id="main-wrapper">
    <div id="main">
        <div id="main-inner">

            <!-- MAPA -->
<div class="block-content no-padding">
    <div class="block-content-inner">
        <div class="map-wrapper">
            <div id="mapa"></div><!-- /#mapa -->


       
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 map-navigation-positioning">
                        <div class="map-navigation-wrapper">
                            <div class="map-navigation">
                                <form method="post" action="?" class="clearfix">
                                    <div class="form-group col-sm-12">
                                        <label>Estado</label>

                                        <div class="select-wrapper">
                                            <select name="selectcountry" id="selectcountry" class="form-control">
                                                <option value="">Selecionar estado</option>
                                                <?php

                                                    $sql = "SELECT cod_estados, sigla
                                                            FROM estados
                                                            ORDER BY sigla";
                                                    $res = mysqli_query($ib->conexao,$sql);
                                                    while ( $row = mysqli_fetch_assoc( $res ) ) {
                                                        echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Cidade</label>
                                            <span class="carregando">Aguarde, carregando...</span>
                                        <div class="select-wrapper">
                                            <select name="selectlocation" id="selectlocation" class="form-control">
                                                <option value="">Selecionar cidade</option>
                                
                                            </select>
                                            <!--PEGANDO CIDADES DE ACORDO COM O ESTADO SELECIONADO VIA JSON-->
                                            <script src="http://www.google.com/jsapi"></script>
                                            <script type="text/javascript">
                                              google.load('jquery', '1.3');
                                            </script>       

                                            <script type="text/javascript">
                                            $.ajaxSetup({
                                                timeout: 3000 // 3 segundos
                                                });
                                            $(function(){
                                                $('#selectcountry').change(function(){
                                                    if( $(this).val() ) {
                                                        $('#selectlocation').hide();
                                                        $('.carregando').show();
                                                        $.getJSON('cidades.ajax.php?search=',{selectcountry: $(this).val(), ajax: 'true'}, function(j){
                                                            var options = '<option value=""></option>'; 
                                                            for (var i = 0; i < j.length; i++) {
                                                                options += '<option value="' + j[i].selectlocation + '">' + j[i].nome + '</option>';
                                                            }   
                                                            $('#selectlocation').html(options).show();
                                                            $('.carregando').hide();
                                                        });
                                                    } else {
                                                        $('#selectlocation').html('<option value="">– Escolha um estado –</option>');
                                                    }
                                                });
                                            });
                                            </script>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Tipo de garagem</label>

                                        <div class="select-wrapper">
                                            <select id="select-sublocation" class="form-control">
                                                <option value="">Coberta</option>
                                                <option value="location-czech-republic-1" class="location-czech-republic-1">Descoberta</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <label>Tamanho Garagem</label>

                                        <div class="select-wrapper">
                                            <select class="form-control">
                                                <option value="apartment">Grande</option>
                                                <option value="building-arae">Média</option>
                                                <option value="condo">Pequena</option>
                                            </select>
                                        </div><!-- /.select-wrapper -->
                                    </div><!-- /.form-group -->

                                   <!-- <div class="form-group col-sm-6">
                                        <label>Price From</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 1000">
                                    </div><!-- /.form-group 

                                    <div class="form-group col-sm-6">
                                        <label>Price To</label>
                                        <input type="text"  class="form-control" placeholder="e.g. 5000">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-12">
                                        <input type="submit" class="btn btn-primary btn-inversed btn-block" value="Filtrar resultados">
                                    </div><!-- /.form-group -->
                                </form>
                            </div><!-- /.map-navigation -->
                        </div><!-- /.map-navigation-wrapper -->
                    </div><!-- /.col-sm-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->

        </div><!-- /.map-wrapper -->
    </div><!-- /.block-content-inner -->
</div><!-- /.block-content -->
            <div class="container">
                <!-- SLOGAN -->
<div class="block-content background-primary background-map block-content-small-padding fullwidth">
    <div class="block-content-inner">
        <h2 class="no-margin center caps">O que é Economia Compartilhada?</h2>
    </div><!-- /.block-content-iner -->
</div><!-- /.block-content-->                <!-- ISOTOPE GRID -->
<div class="block-content block-content-small-padding">
<div class="block-content-inner">
<div class="row">
  <h2 class="center"> ENTENDENDO O CONCEITO: O QUE É ECONOMIA COMPARTILHADA?</h2>

<p>Foi em meio a crise de 2008 que, segundo o colunista do New York Times, Thomas Friedman, tanto a mãe natureza quanto o mercado chegaram a um limite e declararam que o modelo hiper consumista em vigência não era mais sustentável. Alguns fatores chave conduziram esse novo modelo econômico: as preocupações ambientais, a recessão global, as tecnologias e redes sociais e a redefinição do sentido de comunidade.
</p>
<p>Segundo a especialista Rachel Botsman, a economia compartilhada contempla 3 possíveis tipos de sistemas:</p>

<ul><li>Mercados de redistribuição: ocorre quando um item usado passa de um local onde ele não é mais necessário para onde ele é. Baseia-se no princípio do “reduza, re-use, recicle, repare e redistribua”.
</li><li>Lifestyles colaborativos: baseia-se no compartilhamento de recursos, tais como dinheiro, habilidades e tempo.</li>
<li>Sistemas de produtos e serviços: ocorre quando o consumidor paga pelo benefício do produto e não pelo produto em si. Tem como base o princípio de que aquilo que precisamos não é um CD e sim a música que toca nele, o que precisamos é um buraco na parede e não uma furadeira, e se aplica a praticamente qualquer bem.</li></ul>
<p>A economia compartilhada permite que as pessoas mantenham o mesmo estilo de vida, sem precisar adquirir mais, o que impacta positivamente não só no bolso mas também na sustentabilidade do planeta.
</p>
</div>
<!-- /.row -->

<div class="row">
<h2 class="center">COMO A ECONOMIA COMPARTILHADA AFETA A NOSSA ECONOMIA?</h2>

<p>A base fundamental do capitalismo é acumular a maior quantidade possível de bens. A indústria e tudo que a envolve corroboram isso. A publicidade é feita para nos criar desejos, precisamos ter para ser. Os bens são feitos para não durar, modelos novos de eletrônicos são lançados ano a ano tornando nossos produtos recém adquiridos obsoletos, no famoso ciclo da “obsolescência programada”. As empresas lucram quando compramos mais, a economia gira quando compramos mais, somos mais quando compramos mais.<p/>
<p>Pensemos na Ride With, a nova funcionalidade do Waze que facilita caronas. Se as pessoas não precisam mais ter seus próprios carros para se locomover, como fica a indústria automobilística? Qual o impacto para toda essa cadeia: fornecedores, oficinas mecânicas, postos de gasolina, seguradoras…? E para todas as pessoas que trabalham em qualquer ponto dessa cadeia?</p>
<p>A indústria entra em colapso, o faturamento das empresas cai, o desemprego aumenta, leis são criadas para frear esse movimento, empresas tradicionais se revoltam com a concorrência desleal… Não é isso que temos acompanhado nos últimos tempos? A economia colaborativa nos apresenta um novo jeito de consumir focado no usufruir (serviço) substituindo o paradigma da posse do bem (produto).</p>

<p>Se avaliarmos a economia colaborativa com uma mentalidade tradicional não seremos capazes de enxergar a quantidade de oportunidades que despontam nesse novo cenário. Segundo a Forbes, a estimativa é que a economia colaborativa gere uma receita anual de US$3,5 bilhões para os usuários, valor que deve crescer 25% ao ano. Analistas econômicos ainda não incorporam em suas análises o impacto econômico dessa rede colaborativa e há espaço não só para startups mas também para grandes empresas.</p>

<p>Investimentos diretos, aquisições, parcerias e até mudança em seu modelo de negócio são algumas formas que grandes empresas como Avis, GM e Google tem encontrado para ir ao encontro e não na contramão do fenômeno. A gigante DHL, empresa de logística, viu seu faturamento cair e para se reerguer lançou o aplicativo My Ways, capaz de conectar remetentes e destinatários, possibilitando que os próprios clientes fizessem o transporte das encomendas.

A despeito da análise de alguns economistas, empresas grandes, pequenas e até indivíduos podem aumentar seu faturamento e encontrar possibilidades de sobreviver à crise através da economia do compartilhamento.
</p>
<h2>UMA NOVA FORMA DE SE RELACIONAR</h2>

<p>A economia do compartilhamento está mudando não só o modo como entendemos oferta e demanda e a nossa relação com os bens materiais, mas também nossas relações pessoais.

É como se a tecnologia que em algum momento nos afastou, agora estivesse nos colocando de volta para um movimento em que nos comportamos como uma vila, porém com laços que acontecem em escala global. A reputação volta a ter uma importância outrora esquecida, os nossos valores mudam e conhecer pessoas no meio desse caminho torna a experiência ainda melhor.

De tempos em tempos novas revoluções emergem, revoluções capazes de mudar tudo, do modo como trabalhamos ao modo como nos relacionamos. Estamos no centro de uma mudança de era e qualquer reflexão feita hoje, pode fazer menos sentido amanhã. Por isso, para não insistirmos em modelos obsoletos o melhor é enxergar as oportunidades que a economia do compartilhamento nos dá para não só sobrevivermos, como sairmos ainda melhores das crises econômicas que vem colocando em xeque o modo como entendemos mercados e a economia.
</p>
<p>Referencia:</p>
<p><strong>Disponível em :<a href="http://www.troposlab.com/blog/o-que-e-meu-e-seu-economia-do-compartilhamento/" class="btn btn-link">http://www.troposlab.com/</a></strong></p>
                    </div>
                        <!-- /.block-content-inner -->
                </div><!-- /.block-content -->                
            </div><!-- /.container -->
        </div><!-- /#main-inner -->
    </div><!-- /#main -->
</div><!-- /#main-wrapper -->
</div><!-- /#wrapper -->
<?php include "includes/rodape.php";?>
        
</body>
</html>
