<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 20/02/2018
 * Time: 15:09
 */

//include_once dirname(dirname (__DIR__)) . "\\model\\ConfigEmailsModel.php";
//include_once dirname(dirname( __DIR__)) . "\\classes\\Email.php";
//include_once dirname(dirname( __DIR__)) . "\\classes\\phpmailer.php";
//include_once dirname(dirname(__DIR__)) . "\\library\\Uteis.php";


//$tmp = new Uteis();
//$tmp->varz($emails);
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped" cellspacing="0" width="100%">
        <thead class="header">
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Empresa</th>
        <th>Login</th>
        <th>Telefone</th>
        <th>Ativo</th>
        <th><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> </a> </th>
        </thead>
        <tbody>
        <?php foreach ($emails as $k=>$v) : ?>
            <tr>
                <td> <?= $v["ID"];       ?> </td>
                <td> <?= $v["NOME"];     ?> </td>
                <td> <?= $v["EMAIL"];    ?> </td>
                <td> <?= $v["NOMEFANTASIA"];  ?> </td>
                <td> <?= $v["LOGIN"];    ?> </td>
                <td> <?= $v["TELEFONE"]; ?> </td>
                <td> <?= $v["ATIVO"];    ?> </td>
                <td><a href="#">
                        <i class="fa fa-edit" aria-hidden="true" onclick="editMail()"></i>
                        <i class="fa fa-trash-o" aria-hidden="true" onclick="deleteMail()"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<Script>
    function editMail()
    {
        alert("EDIT");
    }

    function deleteMail()
    {
        alert("DELETE");
    }
</Script>*/