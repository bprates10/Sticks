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
    public function getEmpresas()
    {
        $resultados = [];
        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT 	* FROM EMPRESAS";

            //if ($empresa != "")
                //$sql .= " WHERE ID = {$empresa}";

            $res = $con->query($sql);
            foreach($con->fetchAll($res) as $k => $v) {
                $empresa = new \Models\Empresas();
                $empresa->setId($v['ID']);
                $empresa->setNomefantasia($v['NOMEFANTASIA']);
                $empresa->setRazaosocial($v['RAZAOSOCIAL']);
                $empresa->setCnpj($v['CNPJ']);
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