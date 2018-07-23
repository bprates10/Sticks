<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 06/05/2018
 * Time: 18:28
 */

namespace Controllers;

use DAO\UsuarioDAO;

/*if (isset($_POST['act']) && !empty($_POST['act']))
{
    $mail = new EmailsController();
    $acao = strtoupper($_POST['act']);

    if ($acao == 'lerEmail')
    {
        $dao = new UsuarioDAO();
        varzx($dao);
        $mail->connMail("imap.gmail.com", "993", "Teste", "bprates10@gmail.com", "");
        $count = $mail->countMail("bprates10@gmail.com");
        return $count;
    }
}*/


class EmailsController
{

    public static $mail;

    /*public function __construct($server, $port, $folder, $mail, $pwd)
    {
        $mail = imap_open("{" . $server . ":" . $port . $folder, $mail, $pwd);

        if ($mail){
            return $mail;
        }
        else
            print ("ERRO AO CONECTAR COM CAIXA DE EMAIL");
    }

    public function __destruct()
    {
        imap_close(self::$mail);
    }*/

    /* Conecta ao email */
    public function connMail($server, $port, $folder, $mail, $pwd)
    {
        return imap_open("{" . $server . ":" . $port . $folder, $mail, $pwd);
    }

    /* Contabiliza emails da caixa */
    public function countMail($mail_box)
    {
        return imap_num_msg($mail_box);
    }

    /* Retorna array com informações do header do e-mail */
    public function readCabecalho($mail_box, $msg)
    {
        return imap_headerinfo($mail_box, $msg);
    }

    /* Retorna um array com as informações do body do email
     * No body, imap_fetchbody, o terceiro parametro pode ser:
     * 0=> retorna o body da mensagem com o texto que o servidor recebe
     * 1=> retorna somente o conteudo da mensagem em plain-text
     * 2=> retorna o conteudo da mensagem em html */
    public function readBodyMail($mail_box, $msg, $section = 2)
    {
        //$body = header('Content-Type: text/html; charset=utf-8');
        $body = imap_fetchbody($mail_box, $msg, $section);
        //$body = imap_body($mail_box, $msg, $section);

        //$str = mb_convert_encoding($body, "UTF-8");
        //return $str;
        return $body;
    }

    /* Move email da caixa Teste para a caixa bkp. Retorna um booleano */
    public function moveEmail($mail_box, $mensagem, $caminhoBkp)
    {
        return imap_mail_move($mail_box, $mensagem, $caminhoBkp);
    }

    /* *Remove caracteres especiais e acentos do body do email */
    function decodeBodyMail($msg)
    {
        $str = header('Content-Type: text/html; charset=utf-8');
        $str .= preg_replace("/\=([A-F][A-F0-9])/","%$1",$msg);
        $str = urldecode($str);
        $str = mb_convert_encoding($str, "UTF-8");
        return $str;
    }

    public function enviaMail()
    {
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "Library" . DIRECTORY_SEPARATOR . "class.phpmailer.php";

        $mail = new \PHPMailer(true);
        $mail->IsSMTP();

        try {
            $mail->Host = 'smtp.gmail.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
            $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
            $mail->Port       = xxx; //  Usar 587 porta SMTP
            $mail->Username = 'xxx@gmail.com'; // Usuário do servidor SMTP (endereço de email)
            $mail->Password = 'xxx'; // Senha do servidor SMTP (senha do email usado)

            //Define o remetente
            // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->SetFrom('seu@e-mail.com.br', 'Nome'); //Seu e-mail
            $mail->AddReplyTo('seu@e-mail.com.br', 'Nome'); //Seu e-mail
            $mail->Subject = 'Assunto';//Assunto do e-mail


            //Define os destinatário(s)
            //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            $mail->AddAddress('e-mail@destino.com.br', 'Teste Locaweb');

            //Campos abaixo são opcionais
            //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
            //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
            //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
            //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


            //Define o corpo do email
            $mail->MsgHTML('corpo do email');

            ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
            //$mail->MsgHTML(file_get_contents('arquivo.html'));

            $mail->Send();
            echo "Mensagem enviada com sucesso</p>\n";

            //caso apresente algum erro é apresentado abaixo com essa exceção.
        }catch (phpmailerException $e) {
            echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
        }

    }

}
