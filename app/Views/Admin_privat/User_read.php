<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-blue w3-margin-top"><a href="<?= base_url('/administracio_users') ?>">Tornar a Administracion Usuarios</a></button>

    <h2 class="w3-text-blue">Usuario <?= esc($user['User_name']) ?></h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">

        <h3 class="w3-text-dark-grey"><?= esc($user['User_name']) ?></h3>

        <p class="w3-text-dark-grey"><?= esc($user['User_email']) ?></p>

    </div>

    

</div>

<?php echo $this->endSection(); ?>