<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/users') ?>">Tornar a inici</a></button>

    <h2>PAPELERA USUARIS</h2>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Username</th>
                <th>Nom Complet</th>
                <th>Role</th>
                <th>Data eliminacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= character_limiter($user['username'], 20) ?></td>
                <td><?= character_limiter($user['full_name'], 50) ?></td>
                <td><?= esc($user['role'])?></td>
                <td><?= esc($user['deleted_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('/admin/users/restaurarUser/' . esc($user['id'])) ?>">Restaurar Usuari</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>