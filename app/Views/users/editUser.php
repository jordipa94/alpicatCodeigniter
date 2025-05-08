<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <h2>EDITAR USUARI <?= esc($user['id'])?> </h2>

    <div class="w3-padding">
        <form action="<?= base_url('admin/users/updateUser/' . $user['id']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <?= csrf_field(); ?>

            <label for="username" class="w3-text-dark-grey w3-margin-top">Username</label>
            <input type="text" id="username" name="username" class="w3-input w3-border w3-round" value="<?= esc($user['username']) ?>" required>
            
            <label for="full_name" class="w3-text-dark-grey w3-margin-top">Nom complet</label>
            <input type="text" id="full_name" name="full_name" class="w3-input w3-border w3-round" value="<?= esc($user['full_name']) ?>" required>

            <!-- Dropdown role -->
            <label for="role" class="w3-text-dark-grey w3-margin-top">Role</label>
            <select id="role" name="role" class="w3-select w3-border w3-margin-bottom" required>
                <option value="" disabled>Selecciona una opcio</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>ADMIN</option>
                <option value="gestor" <?= $user['role'] === 'gestor' ? 'selected' : '' ?>>GESTOR "GESTIO USUARIS"</option>
            </select>

            <label for="password" class="w3-text-dark-grey w3-margin-top">Nova contrasenya (opcional)</label>
            <input type="password" id="password" name="password" class="w3-input w3-border w3-round">

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-red w3-round">Actualitzar</button>
            </div>

        </form>
    </div>

<?php echo $this->endSection(); ?>