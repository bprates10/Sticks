<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 22/05/2018
 * Time: 22:48
 */

namespace Models;


class ChamadosStatus
{
    private $id;
    private $descricao;

    public function getId () {
        return $this->id;
    }

    public function setId ($id) {
        $this->id = $id;
    }

    public function getDescricao () {
        return $this->descricao;
    }

    public function setDescricao ($descricao) {
        $this->descricao = $descricao;
    }

}