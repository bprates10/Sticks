<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 18/04/2018
 * Time: 12:06
 */

namespace Controllers;

use DAO\UsuarioDAO;
use Models\Usuario;

class UsuarioController
{
    public function listagem($params = [])
    {
        $dao = new UsuarioDAO();
        return $dao->getUsuarios($params);
    }

    public function getUsuariosTotalizadores($params = [])
    {

        $contador = [
            "ativos"      => 0,
            "total"       => 0,
            "clientes"    => 0,
            "colaboradores" => 0
        ];

        // Inicia a iteração em cada chamado
        foreach ($params as $k=>$v)
        {
            // Verifica o status do chamado
            if (strtoupper($v->getIsAtivo()) == "S")
                $contador["ativos"]++;

            if ($v->getIdEmpresa() == 1)
                $contador["colaboradores"]++;
            else
                $contador["clientes"]++;

            $contador["total"]++;
        }
        return $contador;
    }

}