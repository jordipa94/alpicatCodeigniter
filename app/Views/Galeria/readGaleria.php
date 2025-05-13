<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-blue w3-margin-top">
        <a href="<?= base_url('admin/crearGaleria') ?>" style="text-decoration: none; color: white;">Tornar a inici</a>
    </button>

    <h2 class="w3-text-blue">Galeria <?= esc($galeria['id_galeria']) ?></h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">

        <h3 class="w3-text-dark-grey"><?= esc($galeria['nom_galeria']) ?></h3>

        <p class="w3-text-dark-grey"><?= esc($galeria['descripcio_galeria']) ?></p>

        <?php if (!empty($galeria['imatge_galeria'])): ?>
            <img src="<?= base_url('uploads/' . $galeria['imatge_galeria']) ?>" alt="Imatge galeria" style="max-width: 100%; height: auto; margin-top: 10px;">
            <pre><?= esc(substr($galeria['imatge_galeria'], 0, 200)) ?>...</pre>

        <?php endif; ?>

    </div>

</div>

<?= $this->endSection(); ?>
