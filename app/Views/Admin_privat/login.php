<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

    <div class="w3-card-4 w3-light-grey w3-margin-top" style="max-width:600px; margin:auto;">
    
        <div class="w3-container w3-blue w3-center">
            <h2>Login</h2>
        </div>

        <form class="w3-container" action="<?= site_url('/login') ?>" method="post">

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
                <button class="w3-button w3-green w3-margin-bottom" type="submit">Login</button>
            </p>
        </form>
    </div>

<?php echo $this->endSection(); ?>