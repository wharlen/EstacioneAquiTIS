<?php

class Casa {
    
    private $codigo;
    private $cep;
    private $endereco;
    private $numero;
    private $bairro;
    private $cidade;
    private $estado;
    private $dataCriacao;
    private $dataLimite;
    private $seguro;
    private $bloqueado;
    private $pacote;
    private $animal;
    private $status;
    private $latitude;
    private $longitude;
    
    private $usuario;
    
    public function setCodigo($codigo){
        if($codigo != ''){
            $this->codigo = $codigo;
        }
    }
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setCep($cep){
        if($cep != ''){
            $this->cep = $cep;
        }
    }
    public function getCep(){
        return $this->cep;
    }
    
    public function setEndereco($endereco){
        if($endereco != ''){
            $this->endereco = $endereco;
        }
    }
    public function getEndereco(){
        return $this->endereco;
    }
    
    public function setNumero($numero){
        if($numero != ''){
            $this->numero = $numero;
        }
    }
    public function getNumero(){
        return $this->numero;
    }
    
    public function setBairro($bairro){
        if($bairro != ''){
            $this->bairro = $bairro;
        }
    }
    public function getBairro(){
        return $this->bairro;
    }
    
    public function setCidade($cidade){
        if($cidade != ''){
            $this->cidade = $cidade;
        }
    }
    public function getCidade(){
        return $this->cidade;
    }
    
    public function setEstado($estado){
        if($estado != ''){
            $this->estado = $estado;
        }
    }
    public function getEstado(){
        return $this->estado;
    }
    
    public function setDataCriacao($dataCriacao){
        if($dataCriacao != ''){
            $this->dataCriacao = $dataCriacao;
        }
    }
    public function getDataCriacao(){
        return $this->dataCriacao;
    }
    
    public function setDataLimite($dataLimite){
        if($dataLimite != ''){
            $this->dataLimite = $dataLimite;
        }
    }
    public function getDataLimite(){
        return $this->dataLimite;
    }
    
    public function setSeguro($seguro){
        if($seguro != ''){
            $this->seguro = $seguro;
        }
    }
    public function getSeguro(){
        return $this->seguro;
    }
    
    public function setBloqueado($bloqueado){
        if($bloqueado != ''){
            $this->bloqueado = $bloqueado;
        }
    }
    public function getBloqueado(){
        return $this->bloqueado;
    }
    
    public function setAnimal($animal){
        if($animal != ''){
            $this->animal = $animal;
        }
    }
    public function getAnimal(){
        return $this->animal;
    }
    
    public function setPacote($pacote){
        if($pacote != ''){
            $this->pacote = $pacote;
        }
    }
    public function getPacote(){
        return $this->pacote;
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
    public function setLatitude($latitude){
        if($latitude != ''){
            $this->latitude = $latitude;
        }
    }
    public function getLatitude(){
        return $this->latitude;
    }
    public function setLongitude($longitude){
        if($longitude != ''){
            $this->longitude = $longitude;
        }
    }
    public function getLongitude(){
        return $this->longitude;
    }
    
    
    var $pTabela = 'casa';
    var $pChave = "cs_codigo";
    var $pStatus = "cs_status";
    var $pColunas = array(
        
    );
    var $pRels = array(
        array(
            "usuario", "us_codigo", "cs_usuario"
        )
    );
    
    
    public function criar(){
        $pColunas_banco = array(
            "cs_cep" => $this->getCep(),
            "cs_endereco" => $this->getEndereco(),
            "cs_numero" => $this->getNumero(),
            "cs_bairro" => $this->getBairro(),
            "cs_cidade" => $this->getCidade(),
            "cs_estado" => $this->getEstado(),
            "cs_datacriacao" => $this->getDataCriacao(),
            "cs_datalimite" => $this->getDataLimite(),
            "cs_seguro" => $this->getSeguro(),
            "cs_animal" => $this->getAnimal(),
            "cs_pacote" => $this->getPacote(),
            "cs_usuario" => $this->getUsuario(),
            "cs_latitude" => $this->getLatitude(),
            "cs_longitude" => $this->getLongitude()
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
