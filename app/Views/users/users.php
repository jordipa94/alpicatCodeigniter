<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTOR USUARIS</h1>

    <!-- BUSCADOR USUARIS -->
    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- CREAR USUARIS -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/users/registerUser') ?>"><i class="fa fa-plus"></i> Crear Usuari</a>
        </button>

        <!-- BUSCAR USUARIS -->
        <form action="<?= base_url('/admin/users/searchUser') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
            <?= csrf_field(); ?>
            <div class="w3-row" style="max-width: 400px; width: 80%;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar notícies..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-round custom-button"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>

        <!-- PAPELERA USUARIS -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/users/papeleraUsers') ?>"><i class="fa fa-trash"></i> Papelera</a>
        </button>
        
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>Username</th>
                <th>Nom complet</th>
                <th>Role</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= character_limiter($user['username'], 20) ?></td>
                <td><?= character_limiter($user['full_name'], 50) ?></td>
                <td><?= esc($user['role'])?></td>
                <td>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/users/editUser/' . esc($user['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('admin/users/deleteUser/' . esc($user['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>