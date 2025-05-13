?>
<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('contingut'); ?>
<div class="w3-container">
    <h2>Detall de l'Esdeveniment</h2>
    <div class="w3-card w3-padding w3-light-grey w3-round">
        <h3><?= esc($evento['titulo']) ?></h3>
        <p><?= esc($evento['descripcion']) ?></p>
        <p><strong>Data Inici:</strong> <?= esc($evento['fecha_inicio']) ?></p>
        <p><strong>Data Fi:</strong> <?= esc($evento['fecha_fin']) ?></p>
        <p><strong>Color:</strong> <span style="background-color: <?= esc($evento['color']) ?>; padding: 5px 10px; color: white;"><?= esc($evento['color']) ?></span></p>
    </div>
    <a href="<?= base_url('eventos') ?>" class="w3-button w3-blue w3-margin-top">Tornar</a>
</div>
<?= $this->endSection(); ?>