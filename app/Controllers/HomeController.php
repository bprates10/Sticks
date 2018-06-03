<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 19/04/2018
 * Time: 23:31
 */

namespace Controllers;

if (isset($_POST['act']) && !empty($_POST['act']))
{
    $redirect = new HomeController();
    $dest =  $redirect->redirectUrl($_POST['url']);
    return $dest;
}

class HomeController
{

    public function redirectUrl($destino) {
        var_dump("BOB");
        var_dump($destino);

        $url = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR;

        if ($destino == 'chamados') {
            return $url . "chamados" . DIRECTORY_SEPARATOR . "listagem_chamados.php";
        }
            //header($url . "chamados/listagem_chamados.php", 1);
        /*if ($destino == 'usuario')
            url = "/ferramentachamados/view/usuarios/listagem_usuarios.php";
        if ($destino == 'empresas')
            url = "/ferramentachamados/view/empresas/listagem_empresas.php";
        if ($destino == 'config')
            url = "/ferramentachamados/view/configuracoes/listagem_configs.php";
        if ($destino == 'dashboard')
            url = "/ferramentachamados/view/dashboard.php";*/

    }

}