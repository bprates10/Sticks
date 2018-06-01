<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 22/05/2018
 * Time: 23:11
 */

namespace DAO;

use \Helpers\Conexao;

class ChamadosStatusDAO extends BaseDAO
{
    public function getStatusChamados($param = "")
    {
        $resultados = [];

        try {
            $con = $this->getConexao();
            $con->connect();

            $sql = "SELECT * FROM CHAMADOS_STATUS";
            $res = $con->query($sql);

            foreach ($con->fetchAll($res) as $k => $v) {
                $chamado = new \Models\ChamadosStatus();
                $chamado->setId($v['ID']);
                $chamado->setDescricao($v['DESCRICAO']);
                $resultados[] = $chamado;
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        } /*finally {
            $con->close();
        }*/
        //var_dump($resultados);
        return $resultados;
    }
}