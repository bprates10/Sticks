<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 05/05/2018
 * Time: 17:41
 */

namespace Controllers;

use DAO\UsuarioDAO;
//use DAO\ChamadosDAO;
//use Helpers\Conexao;
use Helpers\ConexaoEmail;
use DAO\ChamadosHistoricoDAO;

include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "bootstrap.php";

if (isset($_POST['act']) && $_POST['act'] == 'importar_chamados')
{
    $controller = new ChamadosController();
    return $controller->readEmail($_POST);
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

    /* Efetua a leitura da caixa de e-mail.
     * Não recebe parâmetro.
     * Retorna um boolean */
    public function readEmail()
    {
        // Id fixa pois configurações da caixa estão no usuário de ID = 4
        $param['id'] = 1;

        $dao = new UsuarioDAO();
        // Puxa as informações de e-mail passando como parâmetro a ID 4
        $credenciais = $dao->getUsuarios($param);

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

                    $params['emailTo'] = $mail->getToFromEmail($header->to);
                    $params['emailFrom'] = $mail->getToFromEmail($header->from);
                    $params['body'] = utf8_encode($mail->getBody($mbox, $m, 1));
                    $params['title'] = $mail->getTitle($header->subject);
                    $params['date'] = date('d-m-Y H:i:s', strtotime($header->date));

                    // Trata as informações de remetente e destinatário, cadastrando no banco se necessário. Retorna a ID
                    $dao = new \DAO\UsuarioDAO();
                    if (!$dao->isCadastrado($params['emailFrom']))
                        $params['id'] = $dao->insertUsuario($params['emailFrom']);
                    else {
                        $param['email'] = $params['emailFrom']['mailbox'] . '@' . $params['emailFrom']['host'];
                        varz("vai abastecer a param[id]");
                        $params['id'] = $dao->getUsuarios($param);
                    }

                    $obj = $dao->getUsuarios($params);
                    varz("valor obj");
                    varzx($obj);
                    $params['idFrom'] = $obj[0]->getId();

                    // Prioridade baixa e Status aberto por default
                    $params['prioridade'] = 1;
                    $params['status'] = 1;

                    // Chama a inserção do chamado
                    $dao = new \DAO\ChamadosDAO();
                    return $dao->insertChamados($params);
                }
            }
        }
        return false;
    }
}