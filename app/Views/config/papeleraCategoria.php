<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/gestionarCategoria') ?>">Tornar a inici</a></button>

    <h2>PAPELERA CATEGORIES</h2>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom</th>
                <th>Data eliminacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $categoria): ?>
            <tr>
                <td><?= esc($categoria['name'])?></td>
                <td><?= esc($categoria['deleted_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('admin/restaurarCategoria/' . esc($categoria['id'])) ?>">Restaurar Categoria</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>