<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 06/02/2018
 * Time: 23:43
 */

include_once "../../model/UsuarioController.php";

$controller = new UsuarioController();
$results = [];

//Filtra a chamada da classe
if (isset($_POST["action"]))
{
    if ($_POST["action"] == "findUser")
    {
        !empty($_POST["name"])  ? $nome  = $_POST['name']  : $nome  = "";
        !empty($_POST["login"]) ? $login = $_POST['login'] : $login = "";
        !empty($_POST["mail"])  ? $mail  = $_POST['mail']  : $mail  = "";
        $active  = $_POST["active"];

        $results = $controller->getUsuario($nome, $login, $mail, $active);
    }
}

?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped" cellspacing="0" width="100%">
        <thead class="header">
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Login</th>
        <th>Telefone</th>
        <th>Ativo</th>
        <th>Empresa</th>
        <th><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> </a> </th>
        </thead>
        <tbody>
        <?php foreach ($results as $result) : ?>
        <tr>
            <td> <?= $result["ID"];       ?> </td>
            <td> <?= $result["NOME"];     ?> </td>
            <td> <?= $result["EMAIL"];    ?> </td>
            <td> <?= $result["LOGIN"];    ?> </td>
            <td> <?= $result["TELEFONE"]; ?> </td>
            <td> <?= $result["ATIVO"];    ?> </td>
            <td> <?= $result["IDEMPRESA"];  ?> </td>
            <td><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
