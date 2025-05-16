<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/programes/llistatClassificacions') ?>">Tornar a inici</a></button>

    <h2>EDITAR CLASSIFICACIÓ</h2>

    <div class="w3-padding">
        <form action="<?= base_url('admin/programes/updateClassificacio/'.$classification['id']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <?= csrf_field(); ?>

            <label for="competitionName" class="w3-text-dark-grey">Nom</label>
            <input type="text" id="competitionName" name="competitionName" class="w3-input w3-border w3-round" value="<?= esc($classification['competitionName']) ?>" required>

            <label for="contingut" class="w3-text-dark-grey">Contingut</label>
            <input type="text" id="contingut" name="contingut" class="w3-input w3-border w3-round" value="<?= esc($classification['contingut']) ?>" required>
            
            <label for="url" class="w3-text-dark-grey w3-margin-top">URL</label>
            <textarea id="url" name="url" class="w3-input w3-border w3-round" rows="4" required><?= esc($classification['url']) ?></textarea>

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-round custom-button w3-margin-top">Enviar</button>
            </div>

        </form>
    </div>

</div>

<?php echo $this->endSection(); ?>