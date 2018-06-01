<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 14/04/2018
 * Time: 18:51
 */

namespace DAO;

abstract class BaseDAO
{
    protected function getConexao() {

        $con = \Helpers\Registry::getValue("Conexao", null);

        if ($con == null)
        {
            $con = new \Helpers\Conexao([
                "host"=>'localhost',
                "user"=>'root',
                "pass"=>'1234',
                "database"=>'sticks']);
            \Helpers\Registry::setValue("Conexao", $con);

        }
        return $con;
    }
}