<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">
    <h2>GALERIA</h2>

    <main class="w3-container" style="margin-top: 20px;">
        <h2 class="w3-center">Últimes galeries</h2>

        <div class="w3-row-padding" style="overflow: auto;">
            <?php if (!empty($galeries) && is_array($galeries)): ?>
                <?php foreach ($galeries as $index => $galeria): ?>
                    <?php if ($index > 0 && $index % 3 === 0): ?>
                        </div><div class="w3-row-padding">
                    <?php endif; ?>
                    <div class="w3-third w3-margin-bottom">
                        <div class="w3-card w3-padding w3-white">
                            <h3><?= esc($galeria['nom_galeria']) ?></h3>
                            <img src="<?= base_url('uploads/' . esc($galeria['imatge_galeria'])) ?>" alt="" style="width:100%">
                            <p><?= esc($galeria['descripcio_galeria']) ?></p>
                            <a href="<?= base_url('galeria/readGaleria/' .esc($galeria['id_galeria'])) ?>" class="w3-button w3-blue">Obrir galeria</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hi ha galeries disponibles.</p>
            <?php endif; ?>
        </div>

        <!-- Paginador -->
        <div class="w3-center" style="margin-top: 20px;">
            <?= $pager->links() ?>
        </div>
    </main>
</div>

<?php echo $this->endSection(); ?>
