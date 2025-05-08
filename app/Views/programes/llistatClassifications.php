<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTIONAR CLASSIFICACIONS</h1>

    <!-- BUSCADOR DE NOTICIES CRUD -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/admin/programes/searchClassificacio') ?>" method="GET" class="w3-center">
            <?= csrf_field(); ?>
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar notícies..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-red w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Nom</th>
                <th>URL</th>
                <th>Data publicacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($classifications as $classification): ?>
            <tr>
                <td><?= esc($classification['id'])?></td>
                <td><?= character_limiter($classification['nom'], 20) ?></td>
                <td><?= character_limiter($classification['url'], 30) ?></td>
                <td><?= esc($classification['created_at'])?></td>
                <td>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('/admin/programes/editClassificacio/' . esc($classification['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('/admin/programes/deleteClassificacio/' . esc($classification['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>