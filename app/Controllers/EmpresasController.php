<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 20/05/2018
 * Time: 00:29
 */

namespace Controllers;


class EmpresasController
{
    public function buscaEmpresas ($id = "", $ativo = "")
    {
        $dao = new \DAO\EmpresasDAO();
        return $dao->getEmpresas($id, $ativo);
    }

}