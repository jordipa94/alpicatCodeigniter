<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

        <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/users') ?>">Tornar a inici</a></button>

        <h2>REGISTRAR USUARI</h2>

        <form class="w3-card-4 w3-padding w3-round w3-light-grey" action="<?= site_url('admin/users/registerUser') ?>" method="post">

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

            <!-- Dropdown role -->
            <label for="role" class="w3-text-dark-grey w3-margin-top">Role</label>
            <select id="role" name="role" class="w3-select w3-border w3-margin-bottom" required>
                <option value="" disabled selected>Selecciona una opció</option>
                <option value="admin">ADMIN</option>
                <option value="gestor">GESTOR "GESTIO USUARIS"</option>
            </select>

            <p>
                <button style="margin-top:1%;" class="w3-button w3-round custom-button w3-margin-bottom" type="submit">Registrar</button>
            </p>

        </form>

<?php echo $this->endSection(); ?>