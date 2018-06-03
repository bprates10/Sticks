<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 05/05/2018
 * Time: 18:09
 */

namespace Models;


class Chamados
{
    private $id;
    private $title;
    private $body;
    private $idStatus;
    private $idPriority;
    private $idUser;
    private $idSupport;
    private $idCompany;
    private $idPartner;

    public function getId()
    {
        return $this->id;
    }
    public function setId ($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle ($title)
    {
        $this->title = $title;
    }

    public function getBody()
    {
        return $this->body;
    }
    public function setBody ($body)
    {
        $this->body = $body;
    }

    public function getIdStatus()
    {
        return $this->idStatus;
    }
    public function setIdStatus ($idStatus)
    {
        $this->idStatus = $idStatus;
    }

    public function getIdPriority()
    {
        return $this->idPriority;
    }
    public function setIdPriority ($idPriority)
    {
        $this->idPriority = $idPriority;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }
    public function setIdUser ($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdSupport()
    {
        return $this->idSupport;
    }
    public function setIdSupport ($idSupport)
    {
        $this->idSupport = $idSupport;
    }

    public function getIdCompany()
    {
        return $this->idCompany;
    }
    public function setIdCompany ($idCompany)
    {
        $this->idCompany = $idCompany;
    }

    public function getIdPartner()
    {
        return $this->idPartner;
    }
    public function setIdPartner ($idPartner)
    {
        $this->idPartner = $idPartner;
    }
}