<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <button class="w3-button w3-red w3-margin-top"><a href="<?= base_url('/admin/programes/llistatClassificacions') ?>">Tornar a inici</a></button>

    <h1>PAPELERA CLASSIFICACIONS</h1>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom</th>
                <th>URL</th>
                <th>Data eliminacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($classifications as $classification): ?>
            <tr>
                <td><?= esc($classification['competitionName'])?></td>
                <td><?= esc($classification['url'])?></td>
                <td><?= esc($classification['deleted_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('admin/programes/restaurarClassificacio/' . esc($classification['id'])) ?>">Restaurar Classificació</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>