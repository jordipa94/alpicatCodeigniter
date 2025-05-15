<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/galeria/viewLlistatGaleria') ?>">Tornar a inici</a></button>

    <h2>CREAR GALERIA</h2>

    <form action="<?= base_url('admin/galeria/crearGaleria') ?>" method="post" enctype="multipart/form-data" class="w3-card-4 w3-padding w3-round w3-light-grey">
        
        <label for="nom_galeria" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="nom_galeria" name="nom_galeria" class="w3-input w3-border w3-round" required>

        <label for="descripcio_galeria" class="w3-text-dark-grey w3-margin-top">Descripció</label>
        <textarea id="descripcio_galeria" name="descripcio_galeria" class="w3-input w3-border w3-round" rows="4"></textarea>

        <label for="imatge_galeria" class="w3-text-dark-grey w3-margin-top">Pujar imatge</label>
        <input type="file" id="imatge_galeria" name="imatge_galeria" accept="image/*" class="w3-input w3-border w3-round">

        <div class="w3-margin-top">
            <button style="margin-top:1%;" class="w3-button w3-round custom-button w3-margin-bottom" type="submit">Crear Galeria</button>
        </div>
    </form>

<?php echo $this->endSection(); ?>