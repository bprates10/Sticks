<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 23/05/2018
 * Time: 06:29
 */

namespace DAO;

use \Helpers\Conexao;

class ChamadosPrioridadeDAO extends BaseDAO
{
    public function getPrioridadeChamados()
    {
        $resultados = [];

        try {
            $con = $this->getConexao();
            $con->connect();

            $sql = "SELECT * FROM CHAMADOS_PRIORIDADE";
            $res = $con->query($sql);

            foreach ($con->fetchAll($res) as $k => $v) {
                $chamado = new \Models\ChamadosPrioridade();
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
        return $resultados;
    }
}