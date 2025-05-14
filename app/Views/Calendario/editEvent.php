<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-blue w3-margin-top">
        <a href="<?= base_url('/calendario/addEvent') ?>" style="text-decoration: none; color: white;">Tornar a inici</a>
    </button>

    <h2>EDITAR ESDEVENIMENT</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="w3-padding">
        <form action="<?= base_url('calendario/editEvent/' . $evento['id_evento']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <label for="titulo" class="w3-text-dark-grey">Títol</label>
            <input type="text" id="titulo" name="titulo" class="w3-input w3-border w3-round" 
                   value="<?= esc($evento['titulo']) ?>" required>

            <label for="descripcion" class="w3-text-dark-grey w3-margin-top">Descripció</label>
            <textarea id="descripcion" name="descripcion" class="w3-input w3-border w3-round" rows="4"><?= esc($evento['descripcion']) ?></textarea>

            <label for="fecha_inicio" class="w3-text-dark-grey w3-margin-top">Data Inici</label>
            <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="w3-input w3-border w3-round" 
                   value="<?= esc(date('Y-m-d\TH:i', strtotime($evento['fecha_inicio']))) ?>" required>

            <label for="fecha_fin" class="w3-text-dark-grey w3-margin-top">Data Final</label>
            <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="w3-input w3-border w3-round" 
                   value="<?= esc(date('Y-m-d\TH:i', strtotime($evento['fecha_fin']))) ?>" required>

            <label for="color" class="w3-text-dark-grey w3-margin-top">Color</label>
            <input type="color" id="color" name="color" class="w3-input w3-border w3-round"
                   value="<?= esc($evento['color']) ?>">

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-blue w3-round">Enviar</button>
            </div>

        </form>
    </div>

</div>

<?php echo $this->endSection(); ?>