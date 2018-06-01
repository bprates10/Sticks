<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 20/05/2018
 * Time: 00:22
 */

namespace Models;


class Empresas
{
    private $id;
    private $nomefantasia;
    private $razaosocial;
    private $cnpj;

    public function getId()
    {
        return $this->id;
    }

    public function setId ($id)
    {
        $this->id = $id;
    }

    public function getNomefantasia()
    {
        return $this->nomefantasia;
    }

    public function setNomefantasia($nomefantasia)
    {
        $this->nomefantasia = $nomefantasia;
    }

    public function getRazaosocial()
    {
        return $this->razaosocial;
    }

    public function setRazaosocial ($razaosocial)
    {
        $this->razaosocial = $razaosocial;
    }

    public function getCnpj ()
    {
        return $this->cnpj;
    }

    public function setCnpj ($cnpj)
    {
        $this->cnpj = $cnpj;
    }
}