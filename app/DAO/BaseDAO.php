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

    /* Busca a sequence no bd.
     * Recebe por parâmetro a tabela, a coluna e um inteiro que definirá se a sequence retornada será a atual ou a próxima
     * Retorna o valor da sequence. */
    protected function getSequence($table, $column, $count = 0) {
        $con = $this->getConexao();
        $con->connect();

        $sql = "SELECT MAX($column) + $count as sequence FROM $table";
        $query = $con->query($sql);
        $max = $con->fetchAll($query);
        $max = $max[0];
        return $max['sequence'];
    }
}