<?php
if (!function_exists('autoload')) {

    function autoload($className)
    {
        $className = ltrim($className, '');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        $fileName = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $fileName;

        require $fileName;
    }
    spl_autoload_register('autoload');

}

if (!function_exists("varz")) {
    /**
     * print_r and var_dump friendly
     * @param mixed $arg,...
     */
    function varz($arg)
    {
        $args = func_get_args();
        foreach ($args as $v) {
            echo "<pre>";
            if (is_object($v) || is_array($v))
                print_r($v);
            else
                var_dump($v);
            echo "</pre>";
        }
    }
}

if (!function_exists("varzx")) {
    /**
     * call varz function and exit
     * @param $arg,...
     */
    function varzx($arg)
    {
        $args = func_get_args();
        call_user_func_array('varz', $args);
        die();
    }
}

if (!function_exists("tirarAcentos")) {
    function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
}

if (!function_exists("rotas")) {
    function rotas($pagina) {

        switch($pagina) {
            case "view/chamados/lista_chamados.php":
                require "view/chamados/lista_chamados.php";
                break;
            case "view/relatorios/lista_relatorios.php":
                require "view/relatorios/lista_relatorios.php";
                break;
            case "view/usuarios/lista_usuarios.php":
                require "view/usuarios/lista_usuarios.php";
                break;
            case "view/empresas/listagem_empresas.php":
                require "view/empresas/listagem_empresas.php";
                break;
            /*default:
                require "../index";*/

        }
    }
}

/*if (!function_exists("active")) {
    function active($pagina, $link = "") {
        //varz($pagina, $link);
        /*if ($pagina == $link)
            return 'class="nav-link-text"';
        else
            return '';*
        if ($pagina == $link)
            return 'class="active"';
        else
            return '';
    }
}*/

?>