<?php

class Servico {
    private $codigo;
    private $dataInicial;
    private $dataFinal;
    private $valorTotal;
    private $tipoPagamento;
    private $situacao;
    private $status;
    private $observacao;
    
    private $vaga;
    private $veiculo;
    private $usuario;
    private $latitude;
    private $longitude;

    public function setCodigo($codigo){
        if($codigo != ''){
            $this->codigo = $codigo;
        }
    }
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setDataInicial($dataInicial){
        if($dataInicial != ''){
            $this->dataInicial = $dataInicial;
        }
    }
    public function getDataInicial(){
        return $this->dataInicial;
    }
    
    public function setDataFinal($dataFinal){
        if($dataFinal != ''){
            $this->dataFinal = $dataFinal;
        }
    }
    public function getDataFinal(){
        return $this->dataFinal;
    }    
    
    public function setValorTotal($valorTotal){
        if($valorTotal != ''){
            $this->valorTotal = $valorTotal;
        }
    }
    public function getValorTotal(){
        return $this->valorTotal;
    }
    
    public function setTipoPagamento($tipoPagamento){
        if($tipoPagamento != ''){
            $this->tipoPagamento = $tipoPagamento;
        }
    }
    public function getTipoPagamento(){
        return $this->tipoPagamento;
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
    
    public function setObservacao($observacao){
        if($observacao != ''){
            $this->observacao = $observacao;
        }
    }
    public function getObservacao(){
        return $this->observacao;
    }
    
    public function setVaga($vaga){
        if($vaga != ''){
            $this->vaga = $vaga;
        }
    }
    public function getVaga(){
        return $this->vaga;
    }
    
    public function setVeiculo($veiculo){
        if($veiculo != ''){
            $this->veiculo = $veiculo;
        }
    }
    public function getVeiculo(){
        return $this->veiculo;
    }
    
    public function setUsuario($usuario){
        if($usuario != ''){
            $this->usuario = $usuario;
        }
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setLatitude($Latitude){
        if($Latitude != ''){
            $this->Latitude = $Latitude;
        }
    }
    public function getLatitude(){
        return $this->Latitude;
    }
    public function setLongitude($longitude){
        if($longitude != ''){
            $this->longitude = $longitude;
        }
    }
    public function getLongitude(){
        return $this->longitude;
    }
    
    
    var $pTabela = 'servico';
    var $pChave = "sv_codigo";
    var $pStatus = "sv_status";
    var $pColunas = array(
        
    );
    var $pRels = array( 
        array(
            "veiculo" , "vc_codigo", "sv_veiculo"
        ),
        array(
            "vaga", "vg_codigo", "sv_vaga"
        ),
        array(
            "casa", "cs_codigo", "vg_casa"
        ),
        array(
            "usuario p", "p.us_codigo", "cs_usuario"
        ),
        array(
            "usuario c", "c.us_codigo", "sv_usuario"
        )
    );
    
    
    public function criar(){
        $pColunas_banco = array(
            "sv_datainicial" => $this->getDataInicial(),
            "sv_datafinal" => $this->getDataFinal(),
            "sv_valortotal" => $this->getValorTotal(),
            "sv_usuario" => $this->getUsuario(),
            "sv_veiculo" => $this->getVeiculo(),
            "sv_vaga" => $this->getVaga()
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
