<?= $this->extend('layouts/plantilla'); ?>

<?= $this->section('contingut'); ?>

<?php echo $this->section('contingut'); ?>

    <!-- BUSCADOR DE GALERIES -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('searchGaleria') ?>" method="GET" class="w3-center">
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar galeries..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-blue w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- DIVS AMB GALERIES -->
    <div class="w3-row-padding">
        <?php foreach($galeries as $galeria): ?>
            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3><?= character_limiter($galeria['nom_galeria'], 20) ?></h3>
                    <img src="<?= esc($galeria['imatge_galeria']) ?>" alt="Imagen" width="100px;">
                    <pre><?= esc(substr($galeria['imatge_galeria'], 0, 200)) ?>...</pre>

                    <p><?= character_limiter($galeria['descripcio_galeria'], 50) ?></p>
                    <a href="<?= base_url('galeria/readGaleria/' . esc($galeria['id_galeria'])) ?>" class="w3-button w3-blue">Obrir galeria</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<div class="pagination-container" style="margin-left:1vw">
    <?= $pager->links() ?>
</div>

<?= $this->endSection(); ?>