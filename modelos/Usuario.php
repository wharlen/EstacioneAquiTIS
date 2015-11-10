<?php

class Usuario {
    private $codigo;
    private $nome;
    private $cpf;
    private $sexo;
    private $telefone;
    private $dataNascimento;
    private $rg;
    private $status;
    private $login;
    private $senha;
    
    public function setCodigo($codigo){
        if($codigo != ''){
            $this->codigo = $codigo;
        }
    }
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setNome($nome){
        if($nome != ''){
            $this->nome = $nome;
        }
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function setCpf($cpf){
        if($cpf != ''){
            $this->cpf = $cpf;
        }
    }
    public function getCpf(){
        return $this->cpf;
    }
    
    public function setSexo($sexo){
        if($sexo != ''){
            $this->sexo = $sexo;
        }
    }
    public function getSexo(){
        return $this->sexo;
    }
    
    public function setTelefone($telefone){
        if($telefone != ''){
            $this->telefone = $telefone;
        }
    }
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setDataNascimento($dataNascimento){
        if($dataNascimento != ''){
            $this->dataNascimento = $dataNascimento;
        }
    }
    public function getDataNascimento(){
        return $this->dataNascimento;
    }
    
    public function setRg($rg){
        if($rg != ''){
            $this->rg = $rg;
        }
    }
    public function getRg(){
        return $this->rg;
    }
    
    public function setStatus($status){
        if($status != ''){
            $this->status = $status;
        }
    }
    public function getStatus(){
        return $this->status;
    }
    
    public function setLogin($login){
        if($login != ''){
            $this->login = $login;
        }
    }
    public function getlogin(){
        return $this->login;
    }
    public function setSenha($senha){
        if($senha != ''){
            $this->senha = $senha;
        }
    }
    public function getSenha(){
        return $this->senha;
    }
    
    var $pTabela = 'usuario';
    var $pChave = "us_codigo";
    var $pStatus = "us_status";
    var $pColunas = array(
        
    );
    var $pRels = '';
    
    
    public function criar(){
        $pColunas_banco = array(
            "us_nome" => $this->getNome(),
            "us_cpf" => $this->getCpf(),
            "us_sexo" => $this->getSexo(),
            "us_telefone" => $this->getTelefone(),
            "us_datanascimento" => $this->getDataNascimento(),
            "us_rg" => $this->getRg(),
            "us_login" => $this->getlogin(),
            "us_senha" => $this->getSenha()
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
