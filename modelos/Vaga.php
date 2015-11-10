<?php

class Vaga {
    private $codigo;
    private $descricao;
    private $valorInicial;
    private $tamanho;
    private $tipo;
    private $bloqueado;
    private $situacao;
    private $status;
    
    private $casa;
    
    private $veiculo;
    
    
    
    public function setCodigo($codigo){
        if($codigo != ''){
            $this->codigo = $codigo;
        }
    }
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setDescricao($descricao){
        if($descricao != ''){
            $this->descricao = $descricao;
        }
    }
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setValorInicial($valorInicial){
        if($valorInicial != ''){
            $this->valorInicial = $valorInicial;
        }
    }
    public function getValorInicial(){
        return $this->valorInicial;
    }
    
    public function setTamanho($tamanho){
        if($tamanho != ''){
            $this->tamanho = $tamanho;
        }
    }
    public function getTamanho(){
        return $this->tamanho;
    }
    
    public function setBloqueado($bloqueado){
        if($bloqueado != ''){
            $this->bloqueado = $bloqueado;
        }
    }
    public function getBloqueado(){
        return $this->bloqueado;
    }
    
    public function setTipo($tipo){
        if($tipo != ''){
            $this->tipo = $tipo;
        }
    }
    public function getTipo(){
        return $this->tipo;
    }
    
    public function setSituacao($situacao){
        if($situacao != ''){
            $this->situacao = $situacao;
        }
    }
    public function getSituacao(){
        return $this->situacao;
    }
    
    public function setStatus($status){
        if($status != ''){
            $this->status = $status;
        }
    }
    public function getStatus(){
        return $this->status;
    }
    
    public function setCasa($casa){
        if($casa != ''){
            $this->casa = $casa;
        }
    }
    public function getCasa(){
        return $this->casa;
    }
    
     public function setVeiculo($veiculo){
        if($veiculo != ''){
            $this->veiculo = $veiculo;
        }
    }
    public function getVeiculo(){
        return $this->veiculo;
    }
    
    var $pTabela = 'vaga';
    var $pChave = "vg_codigo";
    var $pStatus = "vg_status";
    var $pColunas = array(
        
    );
    var $pRels = array(
        array(
            "casa", "cs_codigo", "vg_casa"
        ),
        array(
            "veiculo" , "vc_codigo", "vg_veiculo"
        ),
        array(
            "usuario" , "us_codigo", "cs_usuario"
        )
        
    );
    
    
    public function criar(){
        $pColunas_banco = array(
            "vg_descricao" => $this->getDescricao(),
            "vg_valorinicial" => $this->getValorInicial(),
            "vg_tipo" => $this->getTipo(),
            "vg_tamanho" => $this->getTamanho(),
            "vg_casa" => $this->getCasa()
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
