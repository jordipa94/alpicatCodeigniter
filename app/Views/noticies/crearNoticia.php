<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>CREAR NOTÍCIA</h1>

    <!-- FORMULARI PER CREAR UNA NOVA NOTICIA -->
    <form action="crearNoticia" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

        <?= csrf_field(); ?>
        
        <label for="nom" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="nombre" name="nom" class="w3-input w3-border w3-round" required>

        <label for="contingut" class="w3-text-dark-grey w3-margin-top">Contingut</label>
        <textarea id="contingut" name="contingut" class="w3-input w3-border w3-round" rows="4" required></textarea>

        <div class="w3-margin-top">
            <button type="submit" class="w3-button w3-red w3-round">CREAR NOTICIA</button>
        </div>
    </form>

<?php echo $this->endSection(); ?>