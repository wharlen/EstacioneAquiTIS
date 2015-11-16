
<?php
	   if (isset($_SESSION['login'])){
    require "includes/sessao.php";
}
     //incluindo arquivo de conexao ao banco
    require "includes/database.php";
    //incluindo arquivo de Classes/Modelos de dados
    require "includes/modelo.php";
    //incluindo arquivo de funções auxiliares
    include "includes/funcoes.php";
    //incluindo arquivo de titulo da pagina
    include "includes/configsys.php";
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );


	$cod_estados = mysql_real_escape_string( $_REQUEST['selectcountry'] );

	$cidades = array();

	$sql = "SELECT cod_cidades, nome
			FROM cidades
			WHERE estados_cod_estados=$cod_estados
			ORDER BY nome";
	$res = mysqli_query($ib->conexao,$sql);
	while ( $row = mysqli_fetch_assoc($res)) {
		$cidades[] = array(
			'selectlocation'	=> $row['cod_cidades'],
			'nome'			=> (utf8_encode($row['nome'])),
		);
	}

	echo( json_encode( $cidades ) );

	?>