<?php

    class InterfaceBanco{
        // Função que serve para fazer a conexão ao banco
        
        var $conexao;
        var $bd = 'estacionebd';
        
        public function conectaBanco($diretorio='',$usuario='',$senha=''){
            if($diretorio != '' && $usuario != '' && $senha != ''){
            return $this->conexao = mysqli_connect($diretorio,$usuario,$senha) or die(mysql_error());
            }
            return $this->conexao = mysqli_connect("localhost","root",null) or die(mysql_error());
        }

        // Função que seleciona pra qual banco será conectado
        public function selecionarBanco($banco=''){
            if($banco != ''){
                $this->bd = $banco;
            }
            return mysqli_select_db($this->conexao,$this->bd);
        }

        // Função que serve para finalizar a conexão com banco
        public function fecharBanco(){
            
            return mysqli_close($this->conexao);
            
        }

        // Função que serve para executar um comando SQL
        public function executarSQL($query){
            if($query != ''){
            return mysqli_query($this->conexao,$query);
            }
            return '';
        }

        // Função que serve para obter os dados da consulta SQL por linhas
        public function obterDadosSQL($resultado){
            if($resultado != ''){
            return mysqli_fetch_array($resultado, MYSQL_ASSOC);
            }
            return '';
        }

        // Função que retorna a quantidade de linhas de uma consulta
        public function obterQtdeSQL($result){
            if($result != ''){
            return mysqli_num_rows($result);
            }
            return '';
        }
    }
?>

