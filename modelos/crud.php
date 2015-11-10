<?php

function funCreate($pTabela, $pColunas_banco) {
    $comando = "insert into $pTabela ";

    $atr = '';
    $val = '';

    $c = 0;

    $atr .= " (";
    $val .= "values (";

    foreach ($pColunas_banco as $cb => $vb) {
        if ($vb != '') {
            $atr .= ($c != 0 ? ", " : '');
            $val .= ($c != 0 ? ", " : '');

            $atr .= $cb;
            $val .= "'" . $vb . "'";

            $c++;
        }
    }
    $atr .= ") ";
    $val .= "); ";


    return $comando . $atr . $val;
}

function funRead($pTabela, $pChave, $pStatus, $pRels, $atributos = '*', $valor = '', $tipo = '', $order = '', $jn = '') {
    $atr = '';
    if (is_array($atributos)) {
        $c = 0;
        foreach ($atributos as $at) {
            $atr .= ($c != 0 ? ", " : '');
            $atr .= $at;
            $c++;
        }
    } elseif ($atributos == "" || $atributos == '*') {
        $atr = "*";
    } else {
        $atr = $atributos;
    }

    $where = '';
    $comando = "select $atr from $pTabela ";

    $join = "";

    if ($pRels != '' && is_array($pRels)) {
        foreach ($pRels as $relacionamentos) {
            if (is_array($jn)) {
                foreach ($jn as $j1) {
                    $contrel = 0;
                    foreach ($relacionamentos as $cps) {
                        if ($contrel == 0) {

                            if ($j1 == $cps) $join .= "inner join ";
                            else goto andj;
                            
                        } elseif ($contrel == 1) {
                            $join .= " on ";
                        } elseif ($contrel == 2) {
                            $join .= " = ";
                        }

                        $join .= $cps;
                        $contrel++;
                    }
                    
                    $join .= " ";
                    andj:
                }
                
            }elseif($jn == "todos" || $jn != ""){
                $contrel = 0;
                foreach($relacionamentos as $cps){
                    if($contrel == 0){
                        
                        if($jn != "todos"){
                            if($jn == $cps) $join .= "inner join ";
                            else goto andj2;
                        } else $join .= "inner join ";
                        
                        
                    }elseif($contrel == 1){
                        $join .= " on ";
                    }elseif($contrel == 2){
                        $join .= " = ";
                    }
                    
                    $join .= $cps;
                    $contrel++;
                }
                $join .= " ";
                andj2:
            }
            
            
        }
    }



    if (($tipo == '' && $valor != '' && !is_array($valor)) || ($tipo == "codigo")) {
        $where = "$pChave = '$valor' ";
    } elseif ($tipo == "vetor" || is_array($valor)) {
        if (is_array($valor)) {
            $c = 0;
            foreach ($valor as $cl => $vl) {
                $where .= ($c != 0 ? "and " : '');
                $where .= $cl . " ".(substr($vl, 0 , 1 ) != "!" ? "=" : "!=")." '" . (substr($vl, 0 , 1 ) == "!" ? str_replace("!","",$vl) : $vl ). "' ";
                $c++;
            }
        }
    } elseif ($tipo == 'sql') {
        return $comando . $join ." ".($where = $valor);
    }

    $status = "";
    if ($tipo == "A" || $tipo == "E" || $tipo == "I") {
        $status .= ($where != "" ? "and " : "where ") . "$pStatus = '$tipo'";
    } elseif ($tipo == "!A" || $tipo == "!E" || $tipo == "!I") {
        $status .= ($where != "" ? "and " : "where ") . "$pStatus != '" . substr($tipo, 1) . "'";
    }

    $ord = '';
    if ($order != '') {
        $ord = " order by " . $order;
    }

    return $comando .= $join . ($where != '' ? "where " : '') . $where . $status . $ord;
}

function funUpdate($pTabela, $pChave, $dados, $codigo = '', $tipo='') {
    $comando = "update $pTabela set ";
    $set = "";
    $where = '';
    if (is_array($dados)) {
        $c = 0;
        foreach ($dados as $cl => $vl) {
            $set .= ($c != 0 ? ", " : '');
            $set .= $cl . " = '" . $vl . "'";
            $c++;
        }
        $set .= " ";
    } else
        return false;
    $where = "where ";
    if (is_array($codigo)) {
        $c = 0;
        foreach ($codigo as $wl => $el) {
                $where .= ($c != 0 ? "and " : '');
                $where .= $wl . " ".(substr($el, 0 , 1 ) != "!" ? "=" : "!=")." '" . (substr($el, 0 , 1 ) == "!" ? str_replace("!","",$el) : $el ). "' ";
                $c++;
            }
        $where .= "; ";
    } elseif ($tipo == 'codigo' || $tipo == '') {
        $where .= "$pChave = '$codigo';";
    } elseif ($tipo == 'sql') {
        $where .= "$codigo;";
    } else
        return false;

    return $comando . $set . $where;
}

function funDelete($pTabela, $pChave, $condicao) {

    $comando = "delete from $pTabela ";

    $where = 'where ';
    if (is_array($condicao)) {
        $c = 0;
        foreach ($condicao as $k => $v) {
            $where .= ($c != 0 ? "and " : '');
            $where .= $k . " = '" . $v . "'";
            $c++;
        }
        $where .= "; ";
    } else {
        $where .= "$pChave = '$condicao';";
    }

    return $comando . $where;
}
