<?php

namespace Models;

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $pwd;
    //private $login;
    private $idEmpresa;
    private $isAtivo;

    /* Getlers e Setlers */
    // ID
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    // NOME
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // EMAIL
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    // SENHA
    public function getPwd() {
        return $this->pwd;
    }
    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    /*// LOGIN
    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login) {
        $this->login = $login;
    }*/

    // ID_EMPRESA
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }
    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    // ISATIVO
    public function getIsAtivo() {
        return $this->isAtivo;
    }
    public function setIsAtivo($isAtivo) {
        $this->isAtivo = $isAtivo;
    }
}