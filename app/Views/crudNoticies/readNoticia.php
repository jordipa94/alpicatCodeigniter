<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-blue w3-margin-top"><a href="<?= base_url('/') ?>">Tornar a inici</a></button>

    <h2 class="w3-text-blue">Noticia <?= esc($noticia['id']) ?></h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">

        <h3 class="w3-text-dark-grey"><?= esc($noticia['nom']) ?></h3>

        <p class="w3-text-dark-grey"><?= esc($noticia['contingut']) ?></p>

    </div>

</div>

<?php echo $this->endSection(); ?>