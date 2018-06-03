<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 14/04/2018
 * Time: 18:50
 */

namespace DAO;

use \Helpers\Conexao;

class UsuarioDAO extends BaseDAO
{
    public function getUsuarios($id = "", $mail = "")
    {
        $resultados = [];
        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT * FROM USUARIOS";
            if (!empty($id))
                $sql .= " WHERE ID = {$id}";
            else if (!empty($mail))
                $sql .= " WHERE LOWER(EMAIL) = LOWER('$mail')";
            $res = $con->query($sql);

            foreach($con->fetchAll($res) as $k => $v) {
                $usuario = new \Models\Usuario();
                $usuario->setId($v['ID']);
                $usuario->setNome($v['NOME']);
                $usuario->setEmail($v['EMAIL']);
                $usuario->setPwd($v['SENHA']);
                //$usuario->setLogin($v['LOGIN']);
                $resultados[] = $usuario;
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        } /*finally {
            $con->close();
        }*/
        return $resultados;
    }

    public function isCadastrado($params)
    {
        try
        {
            $mail = strtolower($params['mailbox'] . '@' . $params['host']);
            $obj = $this->getUsuarios(null, $mail);
            //varz($obj);

            // Se o e-mail já está cadastrado no banco de dados, retorna a ID cadastrada
            if (!empty($obj)) {
                return $obj[0]->getId();
            }
            // Se não estiver cadastrado, cadastra e retorna a ID cadastrada
            else {
                //varzx($params);
                $this->insertUsuario($params);
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        } /*finally {
            $con->close();
        }*/
    }

    public function insertUsuario($params) {

        try {
            $con = $this->getConexao();
            $con->connect();

            $nome = tirarAcentos($params['personal']);
            $mail = $params['mailbox'] . '@' . $params['host'];

            $sql = "INSERT INTO USUARIOS (nome, email) VALUES ('{$nome}', '{$mail}')";
            $con->query($sql);
            $this->isCadastrado($params);

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        }

    }
}