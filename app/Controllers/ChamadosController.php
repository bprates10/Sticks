<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 05/05/2018
 * Time: 17:41
 */

namespace Controllers;

use DAO\ChamadosDAO;
use Helpers\Conexao;

var_dump($_GET);
if (isset($_GET['action']) && $_GET['action'] == 'filtra_chamado')
{
    $controller = new ChamadosController();
    return $controller->getStatusChamados($_GET);
}

class ChamadosController
{
    function getChamados($idChamado = "")
    {
        $dao = new \DAO\ChamadosDAO();
        return $dao->getChamados();
    }

    function getStatusChamados($param = "")
    {
        $dao = new \DAO\ChamadosStatusDAO();
        return $dao->getStatusChamados($param);
    }

    public function getPrioridadeChamados()
    {
        $dao = new \DAO\ChamadosPrioridadeDAO();
        return $dao->getPrioridadeChamados();
    }

}