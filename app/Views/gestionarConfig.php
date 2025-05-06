<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>Crear Noticia</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Clau</th>
                <th>Valor</th>
                <th>Data Creacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($configs as $config): ?>
            <tr>
                <td><?= esc($config['id'])?></td>
                <td><?= substr($config['clau'], 0, 20) . '...' ?></td>
                <td><?= substr($config['valor'], 0, 40) . '...' ?></td>
                <td><?= esc($config['created_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('noticies/readNoticia/' . esc($config['id'])) ?>">Veure</a></button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/editNoticia/' . esc($config['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('admin/deleteNoticia/' . esc($config['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>