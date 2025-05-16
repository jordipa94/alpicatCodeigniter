<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-round custom-button w3-margin-top">
        <a style="text-decoration:none;" href="<?= base_url('/noticies') ?>">Tornar a inici</a>
    </button>

    <h2>Noticia <?= esc($noticia['id']) ?></h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">

        <h3 class="w3-text-dark-grey"><?= esc($noticia['nom']) ?></h3>

        <!-- Mostrar la imatge si existeix -->
        <?php if (!empty($noticia['imagen_path'])): ?>
            <img src="<?= base_url($noticia['imagen_path']) ?>" alt="Imatge de la notícia" class="w3-image w3-margin-bottom" style="max-width:100%; max-height:400px; object-fit:cover;">
        <?php endif; ?>

        <p class="w3-text-dark-grey"><?= esc($noticia['contingut']) ?></p>

    </div>
   
</div>

<?php echo $this->endSection(); ?>