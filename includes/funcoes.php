<?php
//Função para mostrar somente os algarismos de uma string
function soNumero($str) {
    return preg_replace("/[^0-9]/", "", $str);
}

//Função para formatar datas brasileiras Portal/SRMG
function formatar_data_brasileira($data) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 3);
    $ano = substr($data, 6);
    //mes já está com barra
    return $ano . "/" . $mes . $dia;
}

// Soma de data e hora : Rodrigo
function SomarData($data, $dias) {
    //a data deverá vir no formato dd/mm/yyyy 
    $data = explode("/", $data);
    $meses = 0;
    $ano = 0;    //transformando em segundos
    $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
    return $newData;
}

//apagar diretório não vazio no servidor : Rodrigo
function deletaArquivosDir($dir) {
    $iterator = new RecursiveDirectoryIterator($dir);
    foreach (new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
        if ($file->isDir()) {
            rmdir($file->getPathname());
        } else {
            unlink($file->getPathname());
        }
    }
}

//Demonstrar Session,Get e Post : Rodrigo
function debugar() {
    echo '<pre>';
    echo "GET:<Br>";
    print_r($_GET);
    echo "POST:<Br>";
    print_r($_POST);
    echo "SESSION:<Br>";
    print_r($_SESSION);
    echo '</pre>';
    die();
}

//Formatar data para o padrão com barras
function formatar_data_barras($data_mysql, $maskara) {
    $ano = substr($data_mysql, 0, 4);
    $mes = substr($data_mysql, 5, 2);
    $dia = substr($data_mysql, 8, 2);
    if ($maskara == "dd/mm/yyyy") {
        if ($data_mysql != "") {
            return $dia . "/" . $mes . "/" . $ano;
        } else {
            return "";
        }
    } else if ($maskara == "mm/dd/yyyy") {
        if ($data_mysql != "") {
            return $mes . "/" . $dia . "/" . $ano;
        } else {
            return "";
        }
    }
    return $dia . "/" . $mes . "/" . $ano;
}

//Formatar data e hora para o padrão com barras
function formatar_datahora_barras($data_mysql, $maskara) {
    $ano = substr($data_mysql, 0, 4);
    $mes = substr($data_mysql, 5, 2);
    $dia = substr($data_mysql, 8, 2);
    $hora = substr($data_mysql, 10, 9);
    if ($maskara == "dd/mm/yyyy") {
        if ($data_mysql != "") {
            return $dia . "/" . $mes . "/" . $ano . $hora;
        } else {
            return "";
        }
    } elseif ($maskara == "mm/dd/yyyy") {
        if ($data_mysql != "") {
            return $mes . "/" . $dia . "/" . $ano . $hora;
        } else {
            return "";
        }
    }
    return $dia . "/" . $mes . "/" . $ano . $hora;
}

//Formatar data para o padrão com traços
function formatar_data_tracos($data, $maskara) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    if ($maskara == "yyyy-mm-dd") {
        if ($data != "") {
            return $ano . "-" . $mes . "-" . $dia;
        } else {
            return "";
        }
    } elseif ($maskara == "dd-mm-yyyy") {
        if ($data != "") {
            return $dia . "-" . $mes . "-" . $ano;
        } else {
            return "";
        }
    }
    return $ano . "-" . $mes . "-" . $dia;
}

//Formatar data e hora para o padrão com traços
function formatar_datahora_tracos($data, $maskara) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    $hora = substr($data, 10, 9);
    if ($maskara == "yyyy-mm-dd") {
        if ($data != "") {
            return $ano . "-" . $mes . "-" . $dia . $hora;
        } else {
            return "";
        }
    } elseif ($maskara == "dd-mm-yyyy") {
        if ($data != "") {
            return $dia . "-" . $mes . "-" . $ano . $hora;
        } else {
            return "";
        }
    }
    return $ano . "-" . $mes . "-" . $dia . $hora;
}

//Formatar data padrão americano mm/dd/YYYY hh:mm:ss
function formatar_datahora_eua($data) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    $hora = substr($data, 10, 9);
    return $mes . "/" . $dia . "/" . $ano . " " . $hora;
}

//Formatar data padrão americano mm/dd/YYYY
function formatar_data_EUA($data) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    return $mes . "/" . $dia . "/" . $ano;
}

//Retorna somente a data sem horas
function obter_sodata($datahora) {
    $dia = substr($datahora, 0, 2);
    $mes = substr($datahora, 3, 2);
    $ano = substr($datahora, 6, 4);
    return $dia . "/" . $mes . "/" . $ano;
}

//Retorna somente a data sem horas
function obter_sohora($datahora) {
    $hora = substr($datahora, 11, 9);
    return $hora;
}

//Formatar que obtém só o dia da data
function obter_sodia_databr($data) {
    $dia = substr($data, 0, 2);
    $mes = substr($data, 3, 2);
    $ano = substr($data, 6, 4);
    return $dia;
}

//Formatar que obtém só o dia da data
function obter_sodia_dataeua($data) {
    $ano = substr($data, 0, 4);
    $mes = substr($data, 5, 2);
    $dia = substr($data, 8, 2);
    return $dia;
}

//Função que preenche com zeros a esquerda até um tamanho desejado
function preenche_zeros($numero, $tamanho) {
    while (strlen($numero) < $tamanho) {
        $numero = "0" . $numero;
    }
    return $numero;
}

//Função auxiliar que verifica a incidência de vogais e pronomes
function Encontrou($palavra) {
    $palavras_excluidas = array("DA", "DE", "DO", "DAS", "DOS", "COM", "PARA", "PRA");
    $tpe = count($palavras_excluidas);
    for ($j = 0; $j < $tpe; $j++) {
        if ($palavra == $palavras_excluidas[$j]) {
            return true;
        }
    }
    return false;
}

//Função que irá negritar as palavras dentro de outra
function NegritarPalavras($palavras, $texto) {
    $texto = strtoupper($texto);
    $v_palavras = explode(" ", $palavras);

    //número de palavras informadas no campo com palavras
    if ($palavras != "") {
        $numero_palavras = count($v_palavras) - 1;
    } else {
        $numero_palavras = -1;
    }

    for ($i = 0; $i <= $numero_palavras; $i++) {
        if (!Encontrou($v_palavras[$i])) {
            $texto = str_replace($v_palavras[$i], "<font style='background-color: yellow'><b>" . $v_palavras[$i] . "</b></font>", $texto);
        }
    }
    return $texto;
}

function obter_dia($data_BR) {
    $dia = substr($data_BR, 0, 2);
    return $dia;
}

function obter_mes($data_BR) {
    $mes = substr($data_BR, 3, 2);
    return $mes;
}

function obter_ano($data_BR) {
    $ano = substr($data_BR, 6, 4);
    return $ano;
}

function obter_hora($datatime_BR) {
    $hora = substr($datatime_BR, 6, 4);
    return $hora;
}

//Função que irá formatar o número do CPF 999.999.999-99
function formatar_cpf($cpf) {
    $parte1 = substr($cpf, 0, 3);
    $parte2 = substr($cpf, 3, 3);
    $parte3 = substr($cpf, 6, 3);
    $digito = substr($cpf, 9, 2);
    $cpf_formatado = $parte1 . "." . $parte2 . "." . $parte3 . "-" . $digito;
    return $cpf_formatado;
}

//Função que irá formatar o CEP 99.999-999
function formatar_cep($cep) {
    $parte1 = substr($cep, 0, 2);
    $parte2 = substr($cep, 2, 3);
    $digito = substr($cep, 5, 3);
    $cep_formatado = $parte1 . "." . $parte2 . "-" . $digito;
    return $cep_formatado;
}

//função que retorna o dia da semana em português
function dia_semana($dia) {
    switch ($dia) {
        case 0:
            return "DOMINGO";
            break;
        case 1:
            return "SEGUNDA-FEIRA";
            break;
        case 2:
            return "TERÇA-FEIRA";
            break;
        case 3:
            return "QUARTA-FEIRA";
            break;
        case 4:
            return "QUINTA-FEIRA";
            break;
        case 5:
            return "SEXTA-FEIRA";
            break;
        case 6:
            return "SÁBADO";
            break;
        default:
            return "DIA INVÁLIDO!";
            break;
    }
}

//função que retorna o dia da semana em português
function dia_semana_resumido($dia) {
    switch ($dia) {
        case 0:
            return "DOM";
            break;
        case 1:
            return "SEG";
            break;
        case 2:
            return "TER";
            break;
        case 3:
            return "QUA";
            break;
        case 4:
            return "QUI";
            break;
        case 5:
            return "SEX";
            break;
        case 6:
            return "SÁB";
            break;
        default:
            return "DIA INVÁLIDO!";
            break;
    }
}

function mes($mes) {
    switch ($mes) {
        case 1: return "Janeiro";
        case 2: return "Fevereiro";
        case 3: return "Março";
        case 4: return "Abril";
        case 5: return "Maio";
        case 6: return "Junho";
        case 7: return "Julho";
        case 8: return "Agosto";
        case 9: return "Setembro";
        case 10: return "Outubro";
        case 11: return "Novembro";
        case 12: return "Dezembro";
    }
}

//função que verificará se o dia já foi cadastrado
function dia_cadastrado($dia, $mes, $ano, $datascad, $tamanho) {
    for ($i = 0; $i <= $tamanho; $i++) {
        list($anod, $mesd, $diad) = split('[/.-]', $datascad[$i]);
        if (($dia == $diad) && ($mes == $mesd) && ($ano == $anod)) {
            return true;
        }
    }
    return false;
}

//função que verificará se o dia já foi cadastrado
function ja_cadastrou($dia, $mes, $ano, $todasdatas, $tamanho) {
    for ($i = 0; $i <= $tamanho; $i++) {
        list($anod, $mesd, $diad) = split('[/.-]', $todasdatas[$i]);
        if (($dia == $diad) && ($mes == $mesd) && ($ano == $anod)) {
            return true;
        }
    }
    return false;
}

//função que verificará se o funcionário é o que está na escala do dia
function ta_lotado($dia, $mes, $ano, $datascad, $funcionarioscad, $tamanho, $funcionario_atual) {
    for ($i = 0; $i <= $tamanho; $i++) {
        list($anod, $mesd, $diad) = split('[/.-]', $datascad[$i]);
        if (($dia == $diad) && ($mes == $mesd) && ($ano == $anod)) {
            //echo($funcionarioscad[$i]);
            if ($funcionarioscad[$i] == $funcionario_atual) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}

//função que verifica se o dia já está cadastrado na escala do mês
function escala_dia($dia, $mes, $ano, $escala_mes, $tamanho) {
    for ($i = 0; $i < $tamanho; $i++) {
        $dados_escala = explode('*', $escala_mes[$i]);
        list($anod, $mesd, $diad) = split('[/.-]', $dados_escala[0]);
        if (($dia == $diad) && ($mes == $mesd) && ($ano == $anod)) {
            return $escala_mes[$i];
        }
    }
    return 'N';
}

function validar_ldap($servidor, $dominio, $usuario_ad, $senha_ad) {

    // Tenta se conectar com o servidor  
    if (!($connect = @ldap_connect($servidor))) {
        return FALSE;
    }

    // Tenta autenticar no servidor  
    if (!($bind = @ldap_bind($connect, "$dominio\\$usuario_ad", "$senha_ad"))) {
        // se não validar retorna false  
        return FALSE;
    } else {
        // se validar retorna true  
        return TRUE;
    }
}


function timestampBarras($data){
    return mktime(substr($data,11,2), substr($data,14,2), 0, substr($data,3,2), substr($data,0,2), substr($data,6,4));
}

// Função que irá remover os acentos dos caracteres de uma string
function normalizarString($str) {
    $str = htmlentities($str);
    $str = preg_replace('/&((?i)[a-z]{1,2})(?:grave|accent|acute|circ|tilde|uml|ring|lig|cedil|slash);/', '$1', $str);
    $str = str_replace(array('&ETH;', '&eth;', '&THORN;', '&thorn;'), array('dh', 'd', 'TH', 'th'), $str);
    return $str;
}

// Função que irá limitar caracteres de um texto: SFERRAZ
function limita_caracteres($texto, $limite, $quebra = true) {
    $tamanho = strlen($texto);

    // Verifica se o tamanho do texto é menor ou igual ao limite
    if ($tamanho <= $limite) {
        $novo_texto = $texto;
        // Se o tamanho do texto for maior que o limite
    } else {
        // Verifica a opção de quebrar o texto
        if ($quebra == true) {
            $novo_texto = trim(substr($texto, 0, $limite)) . ' ...';
            // Se não, corta $texto na última palavra antes do limite
        } else {
            // Localiza o útlimo espaço antes de $limite
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');
            // Corta o $texto até a posição localizada
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco)) . ' ...';
        }
    }

    // Retorna o valor formatado
    return $novo_texto;
}

function codificacao($string) {
    return mb_detect_encoding($string . 'x', 'UTF-8, ISO-8859-1, ASCII');
}

// Funçao que valida a codificação de uma string: SFERRAZ
function validaCodificacao($string) {

    $codific = codificacao($string);
    if ($codific == "UTF-8") {

        return $string;
    }
    return $string;
}

//SFERRAZ
function abrir_form($tipo, $nome, $link, $onsubmit = '', $atr = '') {
    $form = "<form ".($tipo != '' ? "method='$tipo' " : "method='get' ").($nome != '' ? "name='$nome' " : "") 
            .($link != '' ? "action='$link' " : "").($onsubmit != '' ? "onsubmit='". str_replace("'", "\"", $onsubmit)."' " : "");
    
    if (is_array($atr)) {
        foreach ($atr as $a => $b) {
            $vlr = str_replace("'", "\"", $b);
            $form .= $a . "='" . $vlr . "' ";
        }
    }else{
        $form .= $atr." ";
    }
    
    $form .= ">";
    return $form;
}

//SFERRAZ
function input_form($tipo, $nome = '', $id = '', $valor = '', $atr = '') {
    $input = "<input ".($tipo != '' ? "type='$tipo' " : "type='text' ").($nome != '' ? "name='$nome' " : "")
            .($id != '' ? "id='$id' " : "").($valor != '' ? "value='$valor' " : "");
    
    if (is_array($atr)) {
        foreach ($atr as $a => $b) {
            $vlr = str_replace("'", "\"", $b);
            $input .= $a . "='" . $vlr . "' ";
        }
    }else{
        $input .= $atr." ";
    }
    
    $input .= "/>";
    return $input;
}

function select_form($nome, $values, $id="", $classe="", $atr=""){
    $select = "<select name='$nome'>";
    $options = "";
    foreach ($values as $a => $b){
        $options .= "<options value='$a'>$b</options>";
    }
    return $select.$options."</select>";
}


//SFERRAZ
function fecha_form() {
    return "</form>";
}
