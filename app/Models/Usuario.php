<?php

namespace Models;

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $pwd;
    private $login;

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

    // LOGIN
    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login) {
        $this->login = $login;
    }


    /*public function setLogin($login, $senha)
    {
        $sql = "SELECT ID, LOGIN FROM USUARIOS WHERE lower(LOGIN) = '{$login}' AND lower(SENHA) = '{$senha}'";
        //varzx($sql);
        $query = $this->Conexao->query($sql);

        $fetch = $this->Conexao->fetch($query);

        if ($fetch) {
            $_SESSION["ID"] = $fetch["ID"];
            $_SESSION["LOGIN"] = $fetch["LOGIN"];

            return true;
        }

        return false;
    }*/
}