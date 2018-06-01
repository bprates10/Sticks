<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 18/04/2018
 * Time: 19:40
 */

namespace Controllers;

include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "bootstrap.php";

use DAO\UsuarioDAO;
use Models\Usuario;

if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass']))
{
    $controller = new ValidaLoginController();
    $controller->valida();
}


class ValidaLoginController
{
    public function valida() {

        $dao = new \DAO\UsuarioDAO();
        $res = $dao->validaUsuario($_POST['user'], $_POST['pass']);

        if ($res)
            header('Location: ../../public/home.php');
        else {
            //https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
            http_response_code(403);
            exit('mensagem da página');
        }
    }
}