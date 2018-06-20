<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 09/06/2018
 * Time: 10:38
 */

namespace Models;


class ChamadosHistorico
{
    private $idChamado;
    private $descricao;
    private $idUsuario;
    private $data;

    public function getIdChamado() {
        return $this->idChamado;
    }
    public function setIdChamado($idChamado) {
        $this->idChamado = $idChamado;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = $data;
    }

}