<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 02/06/2018
 * Time: 11:04
 */

namespace Helpers;

class ConexaoEmail
{
    private $host;
    private $usuario;
    private $senha;

    public function __construct($params = [])
    {
        $this->host = $params['host'];
        $this->usuario = $params['usuario'];
        $this->senha = $params['senha'];
    }

    public function getHost() {
        return $this->host;
    }
    public function setHost($host) {
        $this->host = $host;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    //abre conexao
    public function conectar() {
        $mbox = imap_open("{" . $this->getHost() . ":993/imap/ssl}Teste", $this->getUsuario(), $this->getSenha())
            or die ("can't connect: " . imap_last_error());
        return $mbox;
    }

    public function contadorEmails($mbox) {
        return imap_num_msg($mbox);
    }

    public function getToFromEmail($obj) {

        $params = [];

        foreach ($obj as $k => $v) {
            $params['personal'] = $this->getTitle($v->{'personal'});
            $params['mailbox']  = $v->{'mailbox'};
            $params['host']     = $v->{'host'};
        }

        return $params;
    }

    public function getTitle($str)
    {
        return mb_decode_mimeheader(str_replace('_', ' ', $str));
    }

    public function getBody($mbox, $m, $section)
    {
        /* $section pode ser?
        0=> retorna o body da mensagem com o texto que o servidor recebe
        1=> retorna somente o conteudo da mensagem em plain-text
        2=> retorna o conteudo da mensagem em html */

        $body = imap_fetchbody ($mbox, $m, $section);
        $body = preg_replace("/\=([A-F][A-F0-9])/","%$1",$body);
        $body = urldecode($body);
        return $body;
    }
}