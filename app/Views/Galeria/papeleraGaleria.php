<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/galeria/viewLlistatGaleria') ?>">Tornar a inici</a></button>

    <h2>PAPELERA GALERIES</h2>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom galeria</th>
                <th>Descripcio galeria</th>
                <th>Data eliminacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($galeries as $galeria): ?>
            <tr>
                <td><?= character_limiter($galeria['nom_galeria'], 20) ?></td>
                <td><?= character_limiter($galeria['descripcio_galeria'], 50) ?></td>
                <td><?= esc($galeria['deleted_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('/admin/galeria/restaurarGaleria/' . esc($galeria['id_galeria'])) ?>">Restaurar Galeria</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>