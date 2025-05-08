<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTIONAR NOTICIES</h1>

    <!-- BUSCADOR DE NOTICIES CRUD -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/admin/noticies/searchNoticiaCrud') ?>" method="GET" class="w3-center">
            <?= csrf_field(); ?>
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar noticies..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-blue w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Nom</th>
                <th>Contingut</th>
                <th>URL</th>
                <th>Data publicacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($noticies as $noticia): ?>
            <tr>
                <td><?= esc($noticia['id'])?></td>
                <td><?= character_limiter($noticia['nom'], 20) ?></td>
                <td><?= character_limiter($noticia['contingut'], 30) ?></td>
                <td><?= esc($noticia['url'])?></td>
                <td><?= esc($noticia['created_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('noticies/readNoticia/' . esc($noticia['id'])) ?>">Veure</a></button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('/admin/noticies/editNoticia/' . esc($noticia['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('/admin/noticies/deleteNoticia/' . esc($noticia['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>