<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-blue w3-margin-top">
        <a href="<?= base_url('/admin/crearGaleria') ?>" style="text-decoration: none; color: white;">Tornar a inici</a>
    </button>

    <h2>EDITAR GALERIA</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="w3-padding">
        <form action="<?= base_url('admin/updateGaleria/'.$galeria['id_galeria']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <label for="nom_galeria" class="w3-text-dark-grey">Nom</label>
            <input type="text" id="nom_galeria" name="nom_galeria" class="w3-input w3-border w3-round" value="<?= esc($galeria['nom_galeria']) ?>" required>
            
            <label for="descripcio_galeria" class="w3-text-dark-grey w3-margin-top">Descripció</label>
            <textarea id="descripcio_galeria" name="descripcio_galeria" class="w3-input w3-border w3-round" rows="4"><?= esc($galeria['descripcio_galeria']) ?></textarea>

            <label for="imatge_galeria" class="w3-text-dark-grey w3-margin-top">Imatge (nom arxiu o URL)</label>
            <input type="text" id="imatge_galeria" name="imatge_galeria" class="w3-input w3-border w3-round" value="<?= esc($galeria['imatge_galeria']) ?>">

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-blue w3-round">Enviar</button>
            </div>

        </form>
    </div>

</div>

<?= $this->endSection(); ?>
