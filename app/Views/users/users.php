<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h2>GESTIONAR USUARIS</h2>

    <!-- BUSCADOR USUARIS -->
    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- CREAR USUARIS -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/users/registerUser') ?>"><i class="fa fa-plus"></i><span> Crear Usuari</span></a>
        </button>

        <!-- BUSCAR USUARIS -->
        <form action="<?= base_url('/admin/users/searchUser') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
            <?= csrf_field(); ?>
            <div class="w3-row" style="max-width: 400px; width: 80%;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-round custom-button"><i class="fa fa-search"></i><span> Buscar</span></button>
                </div>
            </div>
        </form>

        <!-- PAPELERA USUARIS -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/users/papeleraUsers') ?>"><i class="fa fa-trash"></i><span> Papelera</span></a>
        </button>
        
    </div>

    <table class="w3-table w3-bordered w3-striped">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom de usuari</th>
                <th>Nom complet</th>
                <th>Rol</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= character_limiter($user['username'], 20) ?></td>
                <td><?= character_limiter($user['full_name'], 50) ?></td>
                <td><?= esc($user['role'])?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($user['id']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/users/editUser/' . esc($user['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('admin/users/deleteUser/' . esc($user['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($users as $user): ?>
    <div id="modal-<?= esc($user['id']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($user['id']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de l'usuari</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($user['id']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Nom de usuari:</strong></div>
                    <div class="w3-col s8"><?= esc($user['username']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Valor:</strong></div>
                    <div class="w3-col s8"><?= esc($user['full_name']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($user['created_at']) ?></div>
                </div>
                
                <?php if(isset($user['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($user['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($user['id']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>