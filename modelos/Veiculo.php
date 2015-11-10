<?php

class Veiculo {
    private $codigo;
    private $marca;
    private $modelo;
    private $cor;
    private $ano;
    private $placa;
    private $carroceria;
    private $status;
    
    
    private $usuario;
    
    public function setCodigo($codigo){
        if($codigo != ''){
            $this->codigo = $codigo;
        }
    }
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setMarca($marca){
        if($marca != ''){
            $this->marca = $marca;
        }
    }
    public function getMarca(){
        return $this->marca;
    }
    
    public function setModelo($modelo){
        if($modelo != ''){
            $this->modelo = $modelo;
        }
    }
    public function getModelo(){
        return $this->modelo;
    }
    
    public function setCor($cor){
        if($cor != ''){
            $this->cor = $cor;
        }
    }
    public function getCor(){
        return $this->cor;
    }
    
    public function setAno($ano){
        if($ano != ''){
            $this->ano = $ano;
        }
    }
    public function getAno(){
        return $this->ano;
    }
    
    public function setPlaca($placa){
        if($placa != ''){
            $this->placa = $placa;
        }
    }
    public function getPlaca(){
        return $this->placa;
    }
    
    public function setStatus($status){
        if($status != ''){
            $this->status = $status;
        }
    }
    public function getStatus(){
        return $this->status;
    }
    
    public function setUsuario($usuario){
        if($usuario != ''){
            $this->usuario = $usuario;
        }
    }
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setCarroceria($carroceria){
        if($carroceria != ''){
            $this->carroceria = $carroceria;
        }
    }
    public function getCarroceria(){
        return $this->carroceria;
    }
    
    
    
    var $pTabela = 'veiculo';
    var $pChave = "vc_codigo";
    var $pStatus = "vc_status";
    var $pColunas = array(
        
    );
    var $pRels = array(
        array(
        "usuario" , "us_codigo", "vc_usuario"
        )
    );
    
    
    public function criar(){
        $pColunas_banco = array(
            "vc_marca" => $this->getMarca(),
            "vc_modelo" => $this->getModelo(),
            "vc_cor" => $this->getCor(),
            "vc_ano" => $this->getAno(),
            "vc_placa" => $this->getPlaca(),
            "vc_carroceria" => $this->getCarroceria(),
            "vc_usuario" => $this->getUsuario()
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
