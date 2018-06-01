<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 07/02/2018
 * Time: 23:42
 */

include_once "../../model/EmpresasModel.php";
//var_dump($_POST);

$controller = new EmpresasModel();
$results = [];

//Filtra a chamada da classe
if (isset($_POST["action"]))
{
    if ($_POST["action"] == "findCompany")
    {
        !empty($_POST["id"])  ? $id  = $_POST['id']  : $id  = "";
        !empty($_POST["name"]) ? $name = $_POST['name'] : $name = "";
        !empty($_POST["cnpj"])  ? $cnpj  = $_POST['cnpj']  : $cnpj  = "";
        $active  = $_POST["active"];

        $results = $controller->getCompany($id, $name, $cnpj, $active);
    }
}

?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped" cellspacing="0" width="100%">
        <thead class="header">
        <th>ID</th>
        <th>Empresa</th>
        <th>CNPJ</th>
        <th>Ativo</th>
        <th><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i> </a> </th>
        </thead>
        <tbody>
        <?php foreach ($results as $result) : ?>
            <tr>
                <td> <?= $result["ID"];       ?> </td>
                <td> <?= $result["NOMEFANTASIA"];     ?> </td>
                <td> <?= $result["CNPJ"];    ?> </td>
                <td> <?= $result["ATIVO"];    ?> </td>
                <td>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                    <i class="fa fa-trash-o" aria-hidden="true" onclick="deleteCompany(<?= $result["ID"];       ?>)"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function deleteCompany(idempresa) {
        if (idempresa != "")
    }
</script>