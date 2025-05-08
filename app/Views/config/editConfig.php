<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-blue w3-margin-top"><a href="<?= base_url('/admin/gestionarConfig') ?>">Tornar a inici</a></button>

    <h2>EDITAR <?= esc($config['clau']) ?> </h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <div class="w3-padding">
        <form action="<?= base_url('admin/updateConfig/'.$config['id']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <?= csrf_field(); ?>

            <label for="clau" class="w3-text-dark-grey">Clau</label>
            <input type="text" id="clau" name="clau" class="w3-input w3-border w3-round" value="<?= esc($config['clau']) ?>" disabled required>
            
            <label for="valor" class="w3-text-dark-grey w3-margin-top">Valor</label>
            <textarea id="valor" name="valor" class="w3-input w3-border w3-round" rows="4" required><?= esc($config['valor']) ?></textarea>

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-blue w3-round">Enviar</button>
            </div>

        </form>
    </div>

</div>

<?php echo $this->endSection(); ?>