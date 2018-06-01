<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 23/05/2018
 * Time: 06:30
 */

namespace Models;



class ChamadosPrioridade
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