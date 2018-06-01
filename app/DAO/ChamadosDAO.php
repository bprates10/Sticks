<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 05/05/2018
 * Time: 18:06
 */

namespace DAO;

use \Helpers\Conexao;

class ChamadosDAO extends BaseDAO
{
    public function getChamados($idChamado = "")
    {
        $resultados = [];
        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT 	C.ID,
                            C.TITULO,
                            C.CONTEUDO,
                            P.DESCRICAO AS PRIORIDADE,
                            S.DESCRICAO AS STATUS,
                            U1.NOME AS ATENDENTE,
                            E.NOMEFANTASIA,
                            U2.NOME AS CONTATO
                    FROM CHAMADOS C
                    LEFT JOIN CHAMADOS_PRIORIDADE P ON P.ID = C.ID_PRIORIDADE
                    LEFT JOIN CHAMADOS_STATUS S ON S.ID = C.ID_STATUS
                    LEFT JOIN USUARIOS U1 ON U1.ID = C.ID_ATENDENTE
                    LEFT JOIN USUARIOS U2 ON U2.ID = C.ID_CONTATO_CHAMADO
                    LEFT JOIN EMPRESAS E ON E.ID = C.ID_EMPRESA_CHAMADO";

            if ($idChamado != "")
                $sql .= " WHERE ID = {$idChamado}";

            $res = $con->query($sql);
            $chamados = $con->fetchAll($res);

            foreach($chamados as $k => $v) {
                $chamado = new \Models\Chamados();
                $chamado->setId($v['ID']);
                $chamado->setTitle($v['TITULO']);
                $chamado->setBody($v['CONTEUDO']);
                $chamado->setIdStatus($v['STATUS']);
                $chamado->setIdPriority($v['PRIORIDADE']);
                $chamado->setIdUser($v['ATENDENTE']);
                $chamado->setIdSupport($v['CONTATO']);
                $chamado->setIdCompany(($v['NOMEFANTASIA']));
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