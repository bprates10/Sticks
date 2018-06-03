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
    public function listagem() {
        $dao = new UsuarioDAO();
        return $dao->getUsuarios();
    }
}