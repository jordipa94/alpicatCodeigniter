<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

<div class="w3-container">

    <h2>LLISTAT NOTICIES</h2>

    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('searchNoticia') ?>" method="GET" class="w3-center">
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
                <td><?= esc($noticia['nom'])?></td>
                <td><?= esc($noticia['contingut'])?></td>
                <td><?= esc($noticia['url'])?></td>
                <td><?= esc($noticia['created_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('readNoticia/' . esc($noticia['id'])) ?>">Veure</a></button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('editNoticia/' . esc($noticia['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('deleteNoticia/' . esc($noticia['id'])) ?>">Eliminar</a></button>
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