<?php

class Fundo {
    
    private $codigo;
    private $descricao;
    private $bolsa;
    
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
    
    
       
    public function aumentarValor($valor){
        return "update fundo set fd_bolsa = (fd_bolsa+'$valor') where fd_codigo = '1' ";
    }
    
}
