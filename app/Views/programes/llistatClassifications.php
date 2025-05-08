<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTIONAR CLASSIFICACIONS</h1>

    <!-- BUSCADOR DE NOTICIES CRUD -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/admin/programes/searchClassificacio') ?>" method="GET" class="w3-center">
            <?= csrf_field(); ?>
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar classificacions..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-red w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Nom</th>
                <th>URL</th>
                <th>Data publicacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($classifications as $classification): ?>
            <tr>
                <td><?= esc($classification['id'])?></td>
                <td><?= character_limiter($classification['nom'], 20) ?></td>
                <td><?= character_limiter($classification['url'], 30) ?></td>
                <td><?= esc($classification['created_at'])?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($classification['id']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('/admin/programes/editClassificacio/' . esc($classification['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('/admin/programes/deleteClassificacio/' . esc($classification['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($classifications as $classification): ?>
    <div id="modal-<?= esc($classification['id']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($classification['id']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de la classificació</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($classification['id']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Nom:</strong></div>
                    <div class="w3-col s8"><?= esc($classification['nom']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>URL:</strong></div>
                    <div class="w3-col s8"><?= esc($classification['url']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($classification['created_at']) ?></div>
                </div>
                
                <?php if(isset($classification['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($classification['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($classification['id']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>