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
    public function getUsuarios()
    {
        $resultados = [];
        try
        {
            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT * FROM USUARIOS";
            $res = $con->query($sql);

            foreach($con->fetchAll($res) as $k => $v) {
                $usuario = new \Models\Usuario();
                $usuario->setId($v['ID']);
                $usuario->setNome($v['NOME']);
                $usuario->setEmail($v['EMAIL']);
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

    /*public function validaUsuario($user, $pass)
    {
        try
        {
            $user = strtoupper($user);
            $pass = strtoupper($pass);

            $con = $this->getConexao();
            $con->connect();
            $sql = "SELECT COUNT(*) AS CNT FROM USUARIO WHERE UPPER(LOGIN) = '{$user}' AND SENHA = '{$pass}'";
            $res = $con->query($sql);

            foreach($con->fetchAll($res) as $k => $v) {
                $resultado = $v['CNT'];
            }

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die("Erro");
        } finally {
            $con->close();
        }

        if ($resultado > 0)
            return true;
        return false;
    }*/
}