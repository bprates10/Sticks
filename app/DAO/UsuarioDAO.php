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
    public function getUsuarios($params = [])
    {
        varz($params);
        $resultados = [];
        (isset($params['id']) && !empty($params['id'])) ? $id = $params['id'] : $id = "";
        (isset($params['email']) && ($params['email']) != 'all') ? $mail = $params['email'] : $mail = "";
        (isset($params['idEmpresa']) && ($params['idEmpresa']) != 'all') ? $idEmpresa = $params['idEmpresa'] : $idEmpresa = "";

        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT * FROM USUARIOS";

            if (!empty($id))
                $sql .= " WHERE ID = {$id}";
            elseif (!empty($mail))
                $sql .= " WHERE LOWER(EMAIL) = LOWER('$mail')";
            elseif (!empty($idEmpresa))
                $sql .= " WHERE ID_EMPRESA = {$idEmpresa}";
            varz($sql);
            $res = $con->query($sql);

            foreach($con->fetchAll($res) as $k => $v) {
                $usuario = new \Models\Usuario();
                $usuario->setId($v['ID']);
                $usuario->setNome($v['NOME']);
                $usuario->setEmail($v['EMAIL']);
                $usuario->setPwd($v['SENHA']);
                //$usuario->setLogin($v['LOGIN']);
                $usuario->setIdEmpresa($v['ID_EMPRESA']);
                $usuario->setIsAtivo(($v['ATIVO']));
                $resultados[] = $usuario;
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        }
        return $resultados;
    }

    /* Verifica se o e-mail está cadastrado no bd.
     * Recebe um array de parâmetros.
     * Retorna um boolean */
    public function isCadastrado($params)
    {
        try
        {
            $mail['email'] = strtolower($params['mailbox'] . '@' . $params['host']);
            $obj = $this->getUsuarios($mail);

            if (!empty($obj))
                return true;

            return false;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        }
    }

    /* Insere um novo usuário no bd.
     * Recebe um array de parâmetros.
     * Retorna a ID do contato cadastrado. */
    public function insertUsuario($params) {

        try {
            $con = $this->getConexao();
            $con->connect();

            $nome = tirarAcentos($params['personal']);
            $mail = $params['mailbox'] . '@' . $params['host'];
            $seq = $this->getSequence("USUARIOS", "ID", 1);

            $sql = "INSERT INTO USUARIOS (id, nome, email) VALUES ($seq, '{$nome}', '{$mail}')";
            $con->query($sql);

            return $seq;

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        }
    }
}