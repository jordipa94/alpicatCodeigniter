<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/gestionarCategoria') ?>">Tornar a inici</a></button>

    <h2>EDITAR <?= esc($categoria['name']) ?></h2>

    <div class="w3-padding">
        <form action="<?= base_url('admin/updateCategoria/'.$categoria['id']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <?= csrf_field(); ?>

            <label for="name" class="w3-text-dark-grey">Nom de la categoria:</label>
            <input type="text" id="name" name="name" class="w3-input w3-border w3-round" value="<?= esc($categoria['name']) ?>" required>

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-round custom-button w3-round">Actualitzar</button>
            </div>

        </form>
    </div>

</div>

<?php echo $this->endSection(); ?>