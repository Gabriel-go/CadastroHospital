<?php

class PessoaBuilder{
    private $id;
    private $cpf;
    private $nome;
    private $endereco;
    private $cidade;
    private $telefone;
    private $tipo;
    private $sexo;

    //gets
    public function getId(){
        return $this->id;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function getCidade(){
        return $this->cidade;  
    }
    public function gettelefone(){
        return $this->telefone;
    }
    public function gettipo(){
        return $this->tipo;
    }
    public function getSexo(){
        return $this->sexo;
    }
    
    //sets
    public function setId($valor){
        $this->id = $valor;
    }
    public function setCpf($valor){
        $this->cpf = $valor;
    }
    public function setNome($valor){
        $this->nome = $valor;
    }
    public function setEndereco($valor){
        $this->endereco = $valor;
    }
    public function setCidade($valor){
        $this->cidade = $valor;
    }
    public function settelefone($valor){
        $this->telefone = $valor;
    }
    public function settipo($valor){
        $this->tipo = $valor;
    }
    public function setSexo($valor){
        $this->sexo = $valor;
    }
    
    public function create(){
         echo 'nao e';
    }   
    public function read(){
        
    }   
    public function update(){
        
    }   
    public function deletar(){
        
    }   

}



?>