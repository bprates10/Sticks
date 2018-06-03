<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 05/05/2018
 * Time: 17:41
 */

namespace Controllers;

use DAO\ChamadosDAO;
use DAO\UsuarioDAO;
use Helpers\Conexao;
use Helpers\ConexaoEmail;

$ctrl = new ChamadosController();

/*if (isset($_GET['action']) && $_GET['action'] == 'filtra_chamado')
{
    $controller = new ChamadosController();
    return $controller->getStatusChamados($_GET);
} */
if (isset($_POST['act']) && $_POST['act'] == 'importar_chamados')
{
    $controller = new ChamadosController();
    return $controller->readEmail();
    //$ctrl->readEmail();
}

class ChamadosController
{
    public function getChamados($params = [])
    {
        $dao = new \DAO\ChamadosDAO();
        return $dao->getChamados($params);
    }

    public function getStatusChamados($param = "")
    {
        $dao = new \DAO\ChamadosStatusDAO();
        return $dao->getStatusChamados($param);
    }

    public function getPrioridadeChamados()
    {
        $dao = new \DAO\ChamadosPrioridadeDAO();
        return $dao->getPrioridadeChamados();
    }

    public function readEmail()
    {
        $dao = new \DAO\UsuarioDAO();

        /*$credenciais = $dao->getUsuarios(4);

        foreach ($credenciais as $v) {
            // Captura credenciais do e-mail
            $params['host'] = "imap.gmail.com";
            $params['usuario'] = $v->getEmail();
            $params['senha'] = $v->getPwd();

            // Instancia a classe de conexão de e-mail
            $mail = new ConexaoEmail($params);
            // Conecta ao e-mail
            $mbox = $mail->conectar();

            // Se existir conexão, procede com a leitura de e-mails
            if ($mbox)
            {
                // Contabiliza os e-mails da caixa e percorre cada um no laço
                for($m = 1; $m <= $mail->contadorEmails($mbox); $m++){
                    $header = imap_headerinfo($mbox, $m);

                    $emailTo = $mail->getToFromEmail($header->to);
                    //varz($emailTo);
                    $emailFrom = $mail->getToFromEmail($header->from);
                    //varz($emailFrom);
                    $body = utf8_encode($mail->getBody($mbox, $m, 1));
                    //varzx(utf8_encode($body));
                    $title = $mail->getTitle($header->subject);
                    $date = date('d-m-Y H:i:s', strtotime($header->date));

                    // Trata as informações de remetente e destinatário, cadastrando no banco se necessário. Retorna a ID
                    $dao = new \DAO\UsuarioDAO();
                    $idTo = $dao->isCadastrado($emailTo);
                    //varz($idTo);
                    $idFrom = $dao->isCadastrado($emailFrom);
                    //varz($idFrom);

                    // Chama a inserção do chamado
                    $dao = new \DAO\ChamadosDAO();
                    return $dao->insertChamados($title, $body, $idTo, $idFrom);

                }
            }
            return false;
        }
        return false;*/
    }

}