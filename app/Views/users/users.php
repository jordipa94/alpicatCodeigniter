<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTOR USUARIS</h1>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Username</th>
                <th>Nom complet</th>
                <th>Role</th>
                <th>Data creacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= esc($user['id'])?></td>
                <td><?= character_limiter($user['username'], 20) ?></td>
                <td><?= character_limiter($user['full_name'], 50) ?></td>
                <td><?= esc($user['role'])?></td>
                <td><?= esc($user['created_at'])?></td>
                <td>
                    <button class="w3-button w3-yellow"><a style="text-decoration: none;" href="<?= base_url('admin/users/editUser/' . esc($user['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a style="text-decoration: none;" href="<?= base_url('admin/users/deleteUser/' . esc($user['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>