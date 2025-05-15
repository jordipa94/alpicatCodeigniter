<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

    <h2>GALERIA</h2>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes galeries</h2>

        <div class="w3-row-padding">
        <?php foreach($galeries as $galeria): ?>

        <div class="w3-third w3-margin-bottom">
            <div class="w3-card w3-padding w3-white">
                <h3><?= substr($galeria['nom_galeria'], 0, 20) . '...' ?></h3>
                <p><?= substr($galeria['descripcio_galeria'], 0, 50) . '...' ?></p>
                <div class="w3-center">
                    <a href="<?= base_url('/galeria/readGaleria/' . esc($galeria['id_galeria'])) ?>">
                        <img style="margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                    </a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
        
    </div>

        <!-- Paginador -->
        <div class="w3-center" style="margin-top: 20px;">
            <?= $pager->links() ?>
        </div>
    </main>

<?php echo $this->endSection(); ?>