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

            if (!empty($params['id'])) {
                $arrCondicoes[$i] = "C.ID = {$params['id']}";
                $i++;
            }
            if (!empty($params['nome'])) {
                $arrCondicoes[$i] = "UPPER(U2.NOME) LIKE UPPER('%{$params['nome']}%')";
                $i++;
            }
            if (isset($params['email']) && $params['email'] != 'all') {
                $arrCondicoes[$i] = "UPPER(U2.EMAIL) LIKE UPPER('%{$params['email']}%')";
                $i++;
            }
            if ($params['origem'] != 'all') {
                $arrCondicoes[$i] = "E1.ID = {$params['origem']}";
                $i++;
            }
            if ($params['destino'] != 'all') {
                $arrCondicoes[$i] = "E2.ID = {$params['destino']}";
                $i++;
            }
            if ($params['status'] != 'all') {
                $arrCondicoes[$i] = "S.ID = {$params['status']}";
                $i++;
            }
            if ($params['prioridade'] != 'all') {
                $arrCondicoes[$i] = "P.ID = {$params['prioridade']}";
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
                $chamado->setIdUser($v['ATENDENTE']);
                $chamado->setIdSupport($v['CONTATO']);
                $chamado->setIdCompany($v['NOMEFANTASIA']);
                $chamado->setIdPartner($v['EMPRESA_ORIGEM']);
                $resultados[] = $chamado;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        } /*finally {
            $con->close();
        }*/
        //varz($resultados);
        return $resultados;
    }

    public function insertChamados($title, $body, $idDestinatario = "", $idRemetente = "", $priority = 2, $status = 1)
    {
        $sucesso = false;

        try {
            $con = $this->getConexao();
            $con->connect();

            $sql = "INSERT INTO CHAMADOS (titulo, conteudo, id_prioridade, id_status, id_contato_chamado, id_atendente) 
                    VALUES ('{$title}', '{$body}', $idRemetente, $idDestinatario, $priority, $status)";
            $sucesso = true;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        } /*finally {
            $con->close();
        }*/
        return $sucesso;
    }
}