<?php

namespace Helpers;

class Conexao
{
    private $host;
    private $user;
    private $pass;
    private $database;
    private $mysqli;

    public function __construct($params = [])
    {
        $this->host = isset($params['host']) ? $params['host'] : "";
        $this->user = isset($params['user']) ? $params['user'] : "";
        $this->pass = isset($params['pass']) ? $params['pass'] : "";
        $this->database = isset($params['database']) ? $params['database'] : "";

        if (empty($this->host) || empty($this->user) || empty($this->pass) || empty($this->database))
        {
            throw new \Exception("Dados não informados.");
        } else {
            return mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        }
    }

    public function __destruct()
    {
        if ($this->mysqli) {
            $this->close();
        }
    }

    public function connect() {
        $this->mysqli = new \Mysqli($this->host, $this->user, $this->pass, $this->database);
        return $this->mysqli;
    }

    public function query($sql) {
        return $this->mysqli->query($sql);
    }

    public function fetchAll($res) {
        if ($res)
            return $res->fetch_all(MYSQLI_ASSOC);
    }

    public function fetch($res) {
        if ($res)
            return $res->fetch(MYSQLI_ASSOC);
    }

    public function fetch_assoc ($res) {

    }

    public function close() {
        if ($this->mysqli)
            $this->mysqli->close();
    }
}