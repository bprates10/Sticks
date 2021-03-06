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
//use DAO\ChamadosDAO;
//use Helpers\Conexao;
use Helpers\ConexaoEmail;
use DAO\ChamadosHistoricoDAO;
use Models\Chamados;

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

    public function getChamadosPorEmpresa()
    {
        $dao = new ChamadosDAO();
        return $dao->getChamadosPorEmpresa();
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

    public function alimentaGraficos()
    {
        $dao = new ChamadosDAO();
        $dao->getDadosGraficos();
    }

    /* Efetua a leitura da caixa de e-mail.
     * Não recebe parâmetro.
     * Retorna um boolean */
    public function readEmail()
    {
        // Inicia a captura das informações do e-mail
        // Id fixa pois configurações da caixa estão no usuário de ID = 1
        $param['id'] = 1;
        // Instancia novo usuário
        $dao = new UsuarioDAO();
        // Puxa as informações de e-mail passando como parâmetro a ID 1
        $credenciais = $dao->getUsuarios($param);

        //foreach ($credenciais as $v) {
        // Captura credenciais do e-mail
        $params['host']    = "imap.gmail.com";
        $params['usuario'] = $credenciais[0]->getEmail();
        $params['senha']   = $credenciais[0]->getPwd();

        // Instancia a classe de conexão de e-mail
        $mail = new ConexaoEmail($params);
        // Reseta parâmetros
        unset($params, $param);

        // Conecta ao e-mail
        $mbox = $mail->conectar();

        // Se existir conexão, procede com a leitura de e-mails
        if ($mbox)
        {
            // Contabiliza os e-mails da caixa e percorre cada um no laço
            for($m = 1; $m <= $mail->contadorEmails($mbox); $m++){
                $header = imap_headerinfo($mbox, $m);

                // Destinatário
                $params['emailTo'] = $mail->getToFromEmail($header->to);
                // Remetente
                $params['emailFrom'] = $mail->getToFromEmail($header->from);
                // Corpo do e-mail
                $params['body'] = utf8_encode($mail->getBody($mbox, $m, 1));
                // Assunto do e-mail
                $params['title'] = $mail->getTitle($header->subject);
                // Data do e-mail
                $params['date'] = date('d-m-Y H:i:s', strtotime($header->date));

                // Trata as informações de remetente e destinatário, cadastrando no banco se necessário. Retorna a ID
                $dao = new \DAO\UsuarioDAO();

                // Verifica se o remetente está cadastrado. Caso não esteja, cadastra.
                if (!$dao->isCadastrado($params['emailFrom']))
                    $params['id'] = $dao->insertUsuario($params['emailFrom']);
                else {
                    $param['email'] = $params['emailFrom']['mailbox'] . '@' . $params['emailFrom']['host'];
                    $params['id'] = $dao->getUsuarios($param);
                }

                $obj = $dao->getUsuarios($params);
                varzx($params);
                $params['idFrom'] = $obj[0]->getId();

                // Prioridade baixa e Status aberto por default
                $params['prioridade'] = 1;
                $params['status'] = 1;

                // Chama a inserção do chamado
                $dao = new \DAO\ChamadosDAO();

                return $dao->insertChamados($params);
            }
        }
        return false;
    }

    /* Efetua a contagem de chamados por status/prioridade
     * Recebe um objeto Chamados
     * Retorna um array chave-valor */
    public function getChamadosFiltrados($param = [])
    {

        $contador = [
            "urgente" => 0,
            "total"   => 0,
            "abertos" => 0,
            "fechados"=> 0
        ];

        // Inicia a iteração em cada chamado
        foreach ($param as $k=>$v)
        {
            // Verifica o status do chamado
            switch (strtolower($v->getIdStatus()))
            {
                case "aberto":
                case "respondido pelo atendente":
                case "respondido pelo cliente":
                case "em espera":
                    $contador["abertos"]++;
                    continue;
                case "resolvido":
                case "fechado":
                    $contador["fechados"]++;
                    continue;
            }

            switch (strtolower($v->getIdPriority()))
            {
                case "urgente":
                    $contador["urgente"]++;
                    continue;
            }
            $contador["total"]++;
        }
        return $contador;
    }
}