<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <button class="w3-button w3-red w3-margin-top"><a href="<?= base_url('/admin/programes/llistatClassificacions') ?>">Tornar a inici</a></button>

    <h1>CREAR CLASSIFICACIÓ</h1>

    <!-- FORMULARI PER CREAR UNA NOVA NOTICIA -->
    <form action="crearClassificacio" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

        <?= csrf_field(); ?>
        
        <label for="competitionName" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="competitionName" name="competitionName" class="w3-input w3-border w3-round" required>

        <label for="url" class="w3-text-dark-grey w3-margin-top">URL</label>
        <textarea id="url" name="url" class="w3-input w3-border w3-round" rows="4" required></textarea>

        <div class="w3-margin-top">
            <button type="submit" class="w3-button w3-red w3-round">CREAR CLASSIFICACIÓ</button>
        </div>
    </form>

<?php echo $this->endSection(); ?>