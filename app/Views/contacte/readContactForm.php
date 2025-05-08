<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-red w3-margin-top"><a href="<?= base_url('/admin/gestionarContacte') ?>">Tornar a inici</a></button>

    <h2 class="w3-text-blue">Formulari <?= esc($missatge['id']) ?></h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">

        <h2 class="w3-text-dark-grey"><?= esc($missatge['concepte']) ?> - <?= esc($missatge['categoria']) ?></h2>

        <p class="w3-text-dark-grey">MISSATGE: <?= esc($missatge['missatge']) ?></p>

        <p class="w3-text-dark-grey">TELEFON: <?= esc($missatge['telefono']) ?></p>

        <p class="w3-text-dark-grey">CORREU: <?= esc($missatge['correu']) ?></p>

        <p class="w3-text-dark-grey">DATA CREACIÓ: <?= esc($missatge['created_at']) ?></p>

    </div>

</div>

<?php echo $this->endSection(); ?>