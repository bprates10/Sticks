<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 09/06/2018
 * Time: 10:50
 */

namespace DAO;

use \Helpers\Conexao;

class ChamadosHistoricoDAO extends BaseDAO
{
    public function getHistoricoChamado($id = "") {

    }
    public function insertHistoricoChamado($params = []) {
        $con = $this->getConexao();
        $con->connect();

        $sql = "INSERT INTO CHAMADOS_HISTORICO VALUES ({$params['next']}, '{$params['act']}', {$params['idFrom']}, SYSDATE(), TIME(SYSDATE()))";
        $con->query($sql);
    }
}