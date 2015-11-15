<?php
    //ARQUIVO QUE SERVE PARA FAZER PROCURA DE VAGAS NO SISTEMA

    //se caso o sistema estiver logado
    if(!isset($_POST['researchv'])){
        require "includes/sessao.php";
        $sqlsess = "and cs_usuario != '".$_SESSION['codigo_usuario']."'";//adicionano condição se caso estiver logado, pois não irá buscar a casa pertencente ao usuario.
    }else $sqlsess = "";
    
     //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
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

<style> #map {
        height: 100%;
      }</style>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAB_9TcfdOpc3Q6vgf-2zHAGtAEiphDeaM&amp;sensor=false"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>

    </head>
   <body onload="initialize()">
     <script type="text/javascript">

    function initialize() 
  { 
    
      var customIcons = {
            1: {
              icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png',
              shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
            },
          2: {
              icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
              shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
            },
        3: {
              icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
              shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
            },
        4: {
              icon: 'http://labs.google.com/ridefinder/images/mm_20_yellow.png',
              shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
            }
        };

      var titulo = "";
      var point = "";
      var endereco = "";
      var email = "";
      var site = "";
      var message = "";
      var tipo = ""; 
      
      point = new google.maps.LatLng(-15.590, -56.090);
      
      var myOptions = {
        zoom: 4,
          center: point,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
      
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
      
     <?php
                $cs = new Casa();
                if(isset($_POST['research'])||isset($_POST['researchv'])){
                    
                    if(isset($_POST['research']))$buscas = $_POST['research'];
                    elseif(isset($_POST['researchv']))$buscas = $_POST['researchv'];
                    
                    if($buscas != ""){
                    $research = "and (cs_endereco like '%".$buscas."%' or "
                            . "cs_numero = '".$buscas."' or "
                            . "cs_bairro like '%".$buscas."%' or "
                            . "cs_cidade like '%".$buscas."%' or "
                            . "cs_estado like '%".$buscas."%'"
                            . ")";
                    }else  $research = "";
                }else $research = "";
                $ib->executarSQL($cs->editar(array("cs_bloqueado"=>"S"),"cs_bloqueado != 'S' and cs_datalimite < '".date('Y-m-d')."' ","sql"));
                
                $vg = new Vaga();
                $result1 = $ib->executarSQL($vg->buscar("distinct cs_endereco, cs_codigo, us_nome",
                    "where vg_situacao != 'O' and vg_bloqueado = 'N' and cs_bloqueado = 'N' $sqlsess and vg_status != 'E' $research","sql","cs_codigo",array("casa","usuario")));
                
                
               
                $nla = $ib->obterQtdeSQL($result1);
                if($nla != 0){
                   while($casa = $ib->obterDadosSQL($result1)){
                     $result2 = $ib->executarSQL($vg->buscar("",array("vg_casa"=>$casa['cs_codigo'],"vg_situacao"=>"!O","vg_bloqueado"=>"N"),"!E","vg_tipo"));
                     $nlb = $ib->obterQtdeSQL($result2);
                if($nlb != 0){
                ?>
                <?php
                while($vaga = $ib->obterDadosSQL($result2)){
                ?>
                <tbody><tr>
                    <?php 
                    switch($vaga['vg_tipo']){
                        case "C":
                            $tipo = "Com cobertura";
                        case "S":
                            $tipo = "Sem Cobertura";
                    }
                    
                    switch($vaga['vg_tamanho']){
                        case "P":
                            $tamanho = "Pequena";
                        case "M":
                            $tamanho = "Media";
                        case "G":
                            $tamanho = "Grande";
                    }
                    
                    
                    
                    ?> 
        titulo = "<?php echo $vaga["descricao"]?>";
        endereco = "<?php echo $tipo?>";
        email = "<?php echo $tamanho?>";
            
        point = new google.maps.LatLng("", "");
        
        var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
          '<div id="bodyContent">'+
          '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
          'sandstone rock formation in the southern part of the '+
          'Heritage Site.</p>'+
          '<p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
          'http://en.wikipedia.org/w/index.php?title=Uluru</a> (last visited June 22, 2009).</p>'+
          '</div>'+
          '</div>';
        
        var contentString = '<div id="content">' + '<p><b>';
        <!--'<div id="content">' + '<p><b>';
        //contentString = contentString + titulo + '<a href="' + site + '">' + site + '</a> </p></b></div>';
        
        var infowindow = new google.maps.InfoWindow({
             content: contentString
        });
    
        var icon = customIcons[tipo] || {};
        var marker = new google.maps.Marker({
          map: map,
                position: point,
                icon: icon.icon,
              shadow: icon.shadow,
          title: titulo
            });
        <!--message = '<font size = "1" >'+ titulo + '<br><a href="' + site + '" TARGET =_BLANK>' + site + '</a></font>';
        message = '<div id="content">'+
          '<font size = "1" >'+ titulo + '<br><a href="' + site + '" TARGET =_BLANK>' + site + '</a></font>'
          '</div>';
        attachMessage(marker, message);
        
      <?php 
        } 
        }
        else{
                    echo "<div align='center'><p>Não há Casas com vagas disponiveis.</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"index.php"'."'></p>"
                    . "</div>";
                }
                               
               $ib->fecharBanco(); 
            ?>
    
  }
      function attachMessage(marker, message) {
          var infowindow = new google.maps.InfoWindow(
              { content: message
        });
         google.maps.event.addListener(marker, 'click', function() {
           infowindow.open(map,marker);
         });

           };
  
    </script>

        <div class="container">
            <?php
            
            include "includes/menu.php";
            
             
                
                               
                    echo "<h2 class='titulo1'>Casas com vagas Disponiveis</h2>";
                ?>
            <div class="container1">    

                <!--TESTE DE MAPA-->
                  
     
   <div id="floating-panel">
    <div>
     <input type="text" id="addressInput" size="10"/>
    <select id="radiusSelect">
      <option value="25" selected>25mi</option>
      <option value="100">100mi</option>
      <option value="200">200mi</option>
    </select>
    <input type="button" onclick="searchLocations()" value="Search"/>
    </div>
    <div><select id="locationSelect" style="width:100%;visibility:hidden"></select></div>
      Digite o endereço de sua localização<input id="address" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Geocode">
    </div>
    <div id="map"></div>
     <script type="text/javascript" src="js/mapa.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAB_9TcfdOpc3Q6vgf-2zHAGtAEiphDeaM&signed_in=true&callback=initMap"
        async defer></script>
         <!--FIM TESTE DE MAPA-->

            <div class='tablediv'>

            
            </div>  <br><br> 
                   <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="index.php"'></p>
            </div> 
                        
            </div>
        </div>
    </body>
</html>