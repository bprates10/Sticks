<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 20/05/2018
 * Time: 00:20
 */

namespace DAO;

use \Helpers\Conexao;

class EmpresasDAO extends BaseDAO
{
    public function getEmpresas($id = "", $ativo = "")
    {
        $resultados = [];
        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT * FROM EMPRESAS";

            $arrCondicoes = [];
            $i = 0;

            if ($id != "") {
                $arrCondicoes[$i] = "ID = {$id}";
                $i++;
            }
            if ($ativo != "") {
                $arrCondicoes[$i] = "ATIVO = {$ativo}";
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
            foreach($con->fetchAll($res) as $k => $v) {
                $empresa = new \Models\Empresas();
                $empresa->setId($v['ID']);
                $empresa->setNomefantasia($v['NOMEFANTASIA']);
                $empresa->setRazaosocial($v['RAZAOSOCIAL']);
                $empresa->setCnpj($v['CNPJ']);
                $empresa->setAtivo($v['ATIVO']);
                $resultados[] = $empresa;
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