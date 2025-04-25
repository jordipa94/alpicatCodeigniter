<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

<div class="w3-padding">

    <h1>Crear Noticia</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <!-- FORMULARI PER CREAR UNA NOVA NOTICIA -->
    <form action="crearNoticia" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">
        
        <label for="nom" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="nombre" name="nom" class="w3-input w3-border w3-round" required>

        <label for="contingut" class="w3-text-dark-grey w3-margin-top">Contingut</label>
        <textarea id="contingut" name="contingut" class="w3-input w3-border w3-round" rows="4" required></textarea>

        <div class="w3-margin-top">
            <button type="submit" class="w3-button w3-blue w3-round">CREAR NOTICIA</button>
        </div>
    </form>

    <!-- BUSCADOR DE NOTICIES CRUD -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/admin/searchNoticiaCrud') ?>" method="GET" class="w3-center">
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
                <td><?= character_limiter($noticia['contingut'], 40) ?></td>
                <td><?= esc($noticia['url'])?></td>
                <td><?= esc($noticia['created_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('noticies/readNoticia/' . esc($noticia['id'])) ?>">Veure</a></button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/editNoticia/' . esc($noticia['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('admin/deleteNoticia/' . esc($noticia['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

</div>

<?php echo $this->endSection(); ?>