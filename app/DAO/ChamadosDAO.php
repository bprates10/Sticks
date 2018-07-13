<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 05/05/2018
 * Time: 18:06
 */

namespace DAO;

use \Helpers\Conexao;
use DAO\ChamadosHistoricoDAO;

class ChamadosDAO extends BaseDAO
{
    public function getChamados($params = [])
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
                            E1.NOMEFANTASIA AS EMPRESA_ORIGEM,
                            U2.NOME AS CONTATO,
                            U2.EMAIL,
                            E2.NOMEFANTASIA
                    FROM CHAMADOS C
                    LEFT JOIN CHAMADOS_PRIORIDADE P ON P.ID = C.ID_PRIORIDADE
                    LEFT JOIN CHAMADOS_STATUS S ON S.ID = C.ID_STATUS
                    LEFT JOIN USUARIOS U1 ON U1.ID = C.ID_ATENDENTE
                    LEFT JOIN USUARIOS U2 ON U2.ID = C.ID_CONTATO_CHAMADO
                    LEFT JOIN EMPRESAS E1 ON E1.ID = C.ID_EMPRESA_CHAMADO
                    LEFT JOIN EMPRESAS E2 ON E2.ID = C.ID_EMPRESA_PARCEIRA";

            // Verifica se existem cláusulas WHERE e insere em um array
            $arrCondicoes = [];
            $i = 0;

            if (isset($params['id']) && !empty($params['id'])) {
                $arrCondicoes[$i] = "C.ID = {$params['id']}";
                $i++;
            }
            if (isset($params['idSolicitante']) && $params['idSolicitante'] != 'all') {
                $arrCondicoes[$i] = "U2.ID = {$params['idSolicitante']}";
                $i++;
            }
            if (isset($params['email']) && $params['email'] != 'all') {
                $arrCondicoes[$i] = "UPPER(U2.EMAIL) LIKE UPPER('%{$params['email']}%')";
                $i++;
            }
            if (isset($params['origem']) && $params['origem'] != 'all') {
                $arrCondicoes[$i] = "E1.ID = {$params['origem']}";
                $i++;
            }
            if (isset($params['destino']) && $params['destino'] != 'all') {
                $arrCondicoes[$i] = "E2.ID = {$params['destino']}";
                $i++;
            }
            if (isset($params['status']) && $params['status'] != 'all') {
                $arrCondicoes[$i] = "S.ID = {$params['status']}";
                $i++;
            }
            if (isset($params['prioridade']) && $params['prioridade'] != 'all') {
                $arrCondicoes[$i] = "P.ID = {$params['prioridade']}";
                $i++;
            }
            if (isset($params['idAtendente']) && $params['idAtendente'] != 'all') {
                $arrCondicoes[$i] = "U1.ID = {$params['idAtendente']}";
                $i++;
            }

            // Extrai o valor do array
            if ($i > 0) {
                $cont = 0;
                foreach ($arrCondicoes as $condicao) {
                    if ($cont == 0) {
                        $sql .= " WHERE " . $condicao;
                        $cont++;
                    }
                    else
                        $sql .= " AND " . $condicao;
                }
            }

            $res = $con->query($sql);
            $chamados = $con->fetchAll($res);

            foreach($chamados as $k => $v) {
                $chamado = new \Models\Chamados();
                $chamado->setId($v['ID']);
                $chamado->setTitle($v['TITULO']);
                $chamado->setBody($v['CONTEUDO']);
                $chamado->setIdStatus($v['STATUS']);
                $chamado->setIdPriority($v['PRIORIDADE']);
                $chamado->setIdUser($v['CONTATO']);
                $chamado->setIdSupport($v['ATENDENTE']);
                $chamado->setIdCompany($v['NOMEFANTASIA']);
                $chamado->setIdPartner($v['EMPRESA_ORIGEM']);
                $resultados[] = $chamado;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        }
        return $resultados;
    }

    public function getChamadosPorEmpresa()
    {
        $con = $this->getConexao();
        $con->connect();

        $sql = "SELECT e1.NOMEFANTASIA AS ORIGEM,
                       (SELECT COUNT(cc.ID_EMPRESA_CHAMADO) FROM CHAMADOS cc WHERE cc.ID_EMPRESA_CHAMADO = e1.ID) AS CONTORIGEM,
                       e2.NOMEFANTASIA AS PARCEIRA,
                       (SELECT COUNT(cc.ID_EMPRESA_PARCEIRA) FROM CHAMADOS cc WHERE cc.ID_EMPRESA_PARCEIRA = e2.ID) AS CONTPARCEIRA
                FROM CHAMADOS c
                LEFT JOIN EMPRESAS e1 ON e1.ID = c.ID_EMPRESA_CHAMADO
                LEFT JOIN EMPRESAS e2 ON e2.ID = c.ID_EMPRESA_PARCEIRA";
        $query = $con->query($sql);
        $res = $con->fetchAll($query);

        $resultado = [];
        if ($res) {
            foreach ($res as $k=>$v){
                $resultado[$k] = $v;
            }
        }
        return $resultado;
    }

    public function insertChamados($params = [])
    {
        try {
            $con = $this->getConexao();
            $con->connect();
            $next = $this->getSequence("CHAMADOS", "ID", 1);

            $sql = "INSERT INTO CHAMADOS (id, titulo, conteudo, id_prioridade, id_status, id_contato_chamado, id_atendente) 
                    VALUES ($next, '{$params['title']}', '{$params['body']}', {$params['prioridade']}, {$params['status']}, {$params['idFrom']}, 1)";
            $con->query($sql);

            try {
                $params['next'] = $this->getSequence("CHAMADOS", "ID", 0);
                $params['act'] = 'Aberto via e-mail';
                $dao = new \DAO\ChamadosHistoricoDAO();
                $dao->insertHistoricoChamado($params);
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                die("Erro ao inserir histórico");
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
        return true;
    }

    public function getDadosGraficos()
    {
        try
        {
            $con = $this->getConexao();
            $con->connect();

            $sql = "SELECT DISTINCT c.ID_STATUS,
				                    count(c.ID_STATUS) AS COUNT_STAT,
				                    c.id_prioridade,
				                    count(c.id_prioridade) AS COUNT_PRIO
                    FROM chamados c
                    GROUP BY c.ID_STATUS, c.id_prioridade";

            $query = $con->query($sql);

            $resultado = [];

            if ($query)
            {
                while($chamados = $con->fetchAll($query))
                {
                    varz($chamados);
                }
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}