<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('admin/calendario/gestioCalendari') ?>">Tornar a inici</a></button>

    <h2>CREAR ESDEVENIMENT</h2>

    <!-- FORMULARI PER CREAR UN NOU ESDEVENIMENT -->
    <form action="<?= base_url('/admin/calendario/addEvent') ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">
        
        <label for="titulo" class="w3-text-dark-grey">Títol</label>
        <input type="text" id="titulo" name="titulo" class="w3-input w3-border w3-round" required>

        <label for="descripcion" class="w3-text-dark-grey w3-margin-top">Descripció</label>
        <textarea id="descripcion" name="descripcion" class="w3-input w3-border w3-round" rows="4"></textarea>

        <label for="fecha_inicio" class="w3-text-dark-grey w3-margin-top">Data Inici</label>
        <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="w3-input w3-border w3-round" required>

        <label for="fecha_fin" class="w3-text-dark-grey w3-margin-top">Data Final</label>
        <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="w3-input w3-border w3-round" required>

        <label for="color" class="w3-text-dark-grey w3-margin-top">Color</label>
        <input type="color" id="color" name="color" class="w3-input w3-border w3-round" value="#3a87ad">

        <div class="w3-margin-top">
            <button style="margin-top:1%;" class="w3-button w3-round custom-button w3-margin-bottom" type="submit">Crear Esdeveniment</button>
        </div>
    </form>

<?php echo $this->endSection(); ?>