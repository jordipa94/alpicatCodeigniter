<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    

        <?php if (session()->getFlashdata('success')): ?>
            <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="w3-panel w3-red w3-padding w3-round w3-margin-bottom">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <h1>REGISTRAR USUARI</h1>

        <form class="w3-card-4 w3-padding w3-round w3-light-grey" action="<?= site_url('admin/registerUser') ?>" method="post">

            <?= csrf_field(); ?>

            <p>
                <label>Nom d'usuari</label>
                <input class="w3-input" type="text" name="username" required>
            </p>

            <p>
                <label>Contrasenya</label>
                <input class="w3-input" type="password" name="password" required>
            </p>

            <p>
                <label>Confirmar contrasenya</label>
                <input class="w3-input" type="password" name="confirm_password" required>
            </p>

            <p>
                <label>Nom complet</label>
                <input class="w3-input" type="text" name="full_name" required>
            </p>

            <!-- Rol per defecte (ocult) -->
            <input type="hidden" name="role" value="visitant">

            <p>
                <button style="margin-top:1%;" class="w3-button w3-red w3-margin-bottom" type="submit">Registrar</button>
            </p>

        </form>

<?php echo $this->endSection(); ?>