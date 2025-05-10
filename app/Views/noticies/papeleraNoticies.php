<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/noticies/llistatNoticies') ?>">Tornar a inici</a></button>

    <h2>PAPELERA NOTÍCIES</h2>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom</th>
                <th>Contingut</th>
                <th>URL</th>
                <th>Data eliminacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($noticies as $noticia): ?>
            <tr>
                <td><?= esc($noticia['nom'])?></td>
                <td><?= esc($noticia['contingut'])?></td>
                <td><?= esc($noticia['url'])?></td>
                <td><?= esc($noticia['deleted_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('admin/noticies/restaurarNoticia/' . esc($noticia['id'])) ?>">Restaurar Noticia</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>