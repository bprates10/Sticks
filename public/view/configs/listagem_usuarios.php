<?php
/**
 * Created by PhpStorm.
 * User: bprat
 * Date: 03/06/2018
 * Time: 18:18
 */

include_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

// Busca informação dos usuarios
$usuarioController = new \Controllers\UsuarioController();
$usuarios = $usuarioController->listagem($_POST);

$empresaController = new \Controllers\EmpresasController();

$cor_coluna_prioridade = "";
$id_row = 0;

?>

<div class="card mb-3">
    <!-- Sub Título -->
    <div class="card-header">
        <i class="fa fa-table"></i> Usuários Cadastrados:</div>
    <!-- Início Datatable Usuários -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th><i class="fa fa-bug"> ID</th>
                    <th><i class="fa fa-child"> Nome</th>
                    <th><i class="envelope-o"></i> E-mail</th>
                    <th><i class="fa fa-handshake-o"> Empresa</th>
                    <th><i class="fa fa-bolt"></i> Ativo</th>
                    <th><i class="fa fa-cog"></i> Ação</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><i class="fa fa-bug"> ID</th>
                    <th><i class="fa fa-child"> Nome</th>
                    <th><i class="envelope-o"></i> E-mail</th>
                    <th><i class="fa fa-handshake-o"> Empresa</th>
                    <th><i class="fa fa-bolt"></i> Ativo</th>
                    <th><i class="fa fa-cog"></i> Ação</th>
                </tr>
                </tfoot>
                <tbody>
                <?php if (!empty($usuarios)) : ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <!-- Tratamento da cor para contato inativo -->
                        <?php $cor_linha_usuario = ""; ?>
                        <?php ($usuario->getIsAtivo() == "N") ? $cor_linha_usuario = "style='color: #FF6347'" : "style='color: '"; ?>
                        <tr>
                            <td <?= $cor_linha_usuario ?>><?= $usuario->getId(); ?></td>
                            <td <?= $cor_linha_usuario ?>><?= $usuario->getNome(); ?></td>
                            <td <?= $cor_linha_usuario ?>><?= $usuario->getEmail(); ?></td>
                            <!-- Tratamento para pegar o nomefantasia da emmpresa -->
                            <?php
                            if (!empty($usuario->getIdEmpresa())) {
                                $empresa = $empresaController->buscaEmpresas($usuario->getIdEmpresa());
                                $empresa = $empresa[0];
                                $empresa = $empresa->getNomeFantasia();
                            } else { $empresa = "<b> Não Cadastrada </b>"; }
                            ?>
                            <td <?= $cor_linha_usuario ?>><?= $empresa; ?></td>
                            <!-- FIM Tratamento para pegar o nomefantasia da emmpresa -->
                            <td <?= $cor_linha_usuario ?>><b><?= $usuario->getIsAtivo(); ?></b></td>
                            <td>
                            <i id="icon_edit_<?= $id_row; ?>" data-toggle="tooltip" title="Editar" class="fa fa-edit" onclick="editar_campos(<?= $id_row; ?>);">
                            <i id="icon_view_<?= $id_row; ?>" data-toggle="tooltip" title="Ver Histórico" class="fa fa-address-book-o" onclick="alert('Implementar histórico do usuário');">
                            <i id="icon_inative_<?= $id_row; ?>" data-toggle="tooltip" title="Inativar Contato" class="fa fa-close" onclick="alert('Implementar inativação do usuário');">
                            <i id="icon_active_<?= $id_row; ?>" data-toggle="tooltip" title="Ativar Contato" class="fa fa-check" onclick="alert('Implementar ativação do usuário');">
                            </td>
                        </tr>
                        <?php $id_row++ ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
