<?php

class Usuario{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $permissao;


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function getPermissao(){
        return $this->permissao;
    }

}


?>