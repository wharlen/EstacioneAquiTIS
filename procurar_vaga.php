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
 <script type="text/javascript">
    //<![CDATA[
    var map;
    var markers = [];
    var infoWindow;
    var locationSelect;
    function load() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(40, -100),
        zoom: 4,
        mapTypeId: 'roadmap',
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
      });
      infoWindow = new google.maps.InfoWindow();
      locationSelect = document.getElementById("locationSelect");
      locationSelect.onchange = function() {
        var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
        if (markerNum != "none"){
          google.maps.event.trigger(markers[markerNum], 'click');
        }
      };
   }
   function searchLocations() {
     var address = document.getElementById("addressInput").value;
     var geocoder = new google.maps.Geocoder();
     geocoder.geocode({address: address}, function(results, status) {
       if (status == google.maps.GeocoderStatus.OK) {
        searchLocationsNear(results[0].geometry.location);
       } else {
         alert(address + ' not found');
       }
     });
   }
   function clearLocations() {
     infoWindow.close();
     for (var i = 0; i < markers.length; i++) {
       markers[i].setMap(null);
     }
     markers.length = 0;
     locationSelect.innerHTML = "";
     var option = document.createElement("option");
     option.value = "none";
     option.innerHTML = "See all results:";
     locationSelect.appendChild(option);
   }
   function searchLocationsNear(center) {
     clearLocations(); 
     var radius = document.getElementById('radiusSelect').value;
     var searchUrl = 'phpsqlsearch_genxml.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
     downloadUrl(searchUrl, function(data) {
       var xml = parseXml(data);
       var markerNodes = xml.documentElement.getElementsByTagName("marker");
       var bounds = new google.maps.LatLngBounds();
       for (var i = 0; i < markerNodes.length; i++) {
         var name = markerNodes[i].getAttribute("name");
         var address = markerNodes[i].getAttribute("address");
         var distance = parseFloat(markerNodes[i].getAttribute("distance"));
         var latlng = new google.maps.LatLng(
              parseFloat(markerNodes[i].getAttribute("lat")),
              parseFloat(markerNodes[i].getAttribute("lng")));
         createOption(name, distance, i);
         createMarker(latlng, name, address);
         bounds.extend(latlng);
       }
       map.fitBounds(bounds);
       locationSelect.style.visibility = "visible";
       locationSelect.onchange = function() {
         var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
         google.maps.event.trigger(markers[markerNum], 'click');
       };
      });
    }
  
    function createMarker(latlng, name, address) {
      var html = "<b>" + name + "</b> <br/>" + address;
      var marker = new google.maps.Marker({
        map: map,
        position: latlng
      });
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
      markers.push(marker);
    }
    function createOption(name, distance, num) {
      var option = document.createElement("option");
      option.value = num;
      option.innerHTML = name + "(" + distance.toFixed(1) + ")";
      locationSelect.appendChild(option);
    }
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };
      request.open('GET', url, true);
      request.send(null);
    }
    function parseXml(str) {
      if (window.ActiveXObject) {
        var doc = new ActiveXObject('Microsoft.XMLDOM');
        doc.loadXML(str);
        return doc;
      } else if (window.DOMParser) {
        return (new DOMParser).parseFromString(str, 'text/xml');
      }
    }
    function doNothing() {}
    //]]>
  </script>
    </head>
    <body>
        <div align="center">
            <?php
            
            include "includes/menu.php";
            
             
                
                               
                    echo "<h2 class='titulo1'>Casas com vagas Disponiveis</h2>";
                ?>
            <div class="container1">    
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
                <h3><?=strtoupper(normalizarString($casa['cs_endereco']." -- ".$casa['us_nome']))?></h3>
                
            <table border="1" class="tabela1">
                <thead><tr>
                    <th width="30%">Descricão</th>
                    <th width="25%">Tipo</th>
                    <th width="20%">Tamanho</th>
                    <th width="10%">Valor/15min</th>
                    <th width="15%">Opções</th>
                    </tr></thead>
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
                    <td><?=$vaga['vg_descricao']?></td>
                    <td><?=$tipo?></td>
                    <td><?=$tamanho?></td>
                    <td><?="R$".number_format($vaga['vg_valorinicial'], 2, ',', '.')?></td>
                    <td>
                        <a href="cadastro.php?tipo=SV&vg=<?=$vaga['vg_codigo']?>">Entrar</a>
                    </td>
                    </tr></tbody>
            
                <?php }
                ?>
           </table>
            
            </div>  <br><br> 
                    <?php
                   }
                   
                   }
                   ?> <p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href="index.php"'></p>
            </div> <?php
                } 
                else{
                    echo "<div align='center'><p>Não há Casas com vagas disponiveis.</p>"
                    . "<p><input type='button' value='Voltar' class='botao01' style='margin:auto' onclick='javascript: window.location.href=".'"index.php"'."'></p>"
                    . "</div>";
                }
                               
               $ib->fecharBanco(); 
            ?>
                        
            </div>
        </div>
    </body>
</html>