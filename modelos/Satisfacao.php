<?php

class Satisfacao {
    private $codigo;
    private $nota;
    
    private $proprietario;
    private $cliente;
    
    public function setCodigo($codigo){
        if($codigo != ''){
            $this->codigo = $codigo;
        }
    }
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setNota($nota){
        if($nota != ''){
            $this->nota = $nota;
        }
    }
    public function getNota(){
        return $this->nota;
    }
    
    public function setProprietario($proprietario){
        if($proprietario != ''){
            $this->proprietario = $proprietario;
        }
    }
    public function getProprietario(){
        return $this->proprietario;
    }
    
    public function setCliente($cliente){
        if($cliente != ''){
            $this->cliente = $cliente;
        }
    }
    public function getCliente(){
        return $this->cliente;
    }
    
    
    var $pTabela = 'satisfacao';
    var $pChave = "sf_codigo";
    var $pStatus = "sf_status";
    var $pColunas = array(
        
    );
    var $pRels = array(
        array(
            "usuario u1", "u1.us_codigo", "sf_proprietario"
        ),
        array(
            "usuario u2", "u2.us_codigo", "sf_cliente"
        )
    );
    
    
    public function criar(){
        $pColunas_banco = array(
            "sf_nota" => $this->getNota(),
            "sf_cliente" => $this->getCliente(),
            "sf_proprietario" => $this->getProprietario()
        );
        return funCreate($this->pTabela, $pColunas_banco );
    }
    
    public function buscar($atributos = '*', $valor = '', $tipo = '', $order = '', $jn = ''){
        return funRead($this->pTabela, $this->pChave, $this->pStatus, $this->pRels, $atributos, $valor, $tipo, $order, $jn);
    }
    
    public function editar($dados, $codigo = '', $tipo=''){
        return funUpdate($this->pTabela, $this->pChave, $dados, $codigo, $tipo);
    }
    
    public function excluir($condicao){
        return funDelete($this->pTabela, $this->pChave, $condicao);
    }
}
