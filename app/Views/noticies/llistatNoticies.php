<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTIONAR NOTÍCIES</h1>

    <!-- BUSCADOR DE NOTICIES CRUD -->
    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- CREAR NOTICIES -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/noticies/crearNoticia') ?>"><i class="fa fa-plus"></i> Crear Noticia</a>
        </button>

        <!-- BUSCAR NOTICIES -->
        <form action="<?= base_url('/admin/noticies/searchNoticiaCrud') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
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

        <!-- PAPELERA -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/noticies/papeleraNoticies') ?>"><i class="fa fa-trash"></i> Papelera</a>
        </button>
        
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
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