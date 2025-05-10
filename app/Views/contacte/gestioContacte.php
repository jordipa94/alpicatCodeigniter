<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h2>GESTIO DE CONTACTE</h2>
    
    <!-- FILTRAR PER CATEGORIA --> 
    <div style="max-width:200px">
        <form action="<?= base_url('/admin/gestionarContacte/filtrar') ?>" method="get" id="filtrarForm">

            <?= csrf_field(); ?>

            <label for="categoria">Filtrar per Categoria</label>
            <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom" onchange="document.getElementById('filtrarForm').submit()">
                <option value="" <?= (empty($categoria)) ? 'selected' : '' ?> >Totes les Categories</option>
                <option value="VETERANS" <?= isset($categoria) && $categoria == 'VETERANS' ? 'selected' : '' ?>>VETERANS</option>
                <option value="JUVENIL" <?= isset($categoria) && $categoria == 'JUVENIL' ? 'selected' : '' ?>>JUVENIL</option>
                <option value="INFANTIL" <?= isset($categoria) && $categoria == 'INFANTIL' ? 'selected' : '' ?>>INFANTIL</option>
            </select>
        </form>
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>Concepte</th>
                <th>Missatge</th>
                <th>Telefono</th>
                <th>Correu</th>
                <th>Categoria</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($missatges as $missatge): ?>
            <tr>
                <td><?= substr($missatge['concepte'], 0, 20) . '...' ?></td>
                <td><?= substr($missatge['missatge'], 0, 40) . '...' ?></td>
                <td><?= esc($missatge['telefono'])?></td>
                <td><?= esc($missatge['correu'])?></td>
                <td><?= esc($missatge['categoria'])?></td>
                <td>
                <button onclick="document.getElementById('modal-<?= esc($missatge['id']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($missatges as $missatge): ?>
    <div id="modal-<?= esc($missatge['id']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($missatge['id']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls del Missatge</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($missatge['id']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Concepte:</strong></div>
                    <div class="w3-col s8"><?= esc($missatge['concepte']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Missatge:</strong></div>
                    <div class="w3-col s8"><?= esc($missatge['missatge']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Telefono:</strong></div>
                    <div class="w3-col s8"><?= esc($missatge['telefono']) ?></div>
                </div>
                
                <?php if(isset($missatge['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Correu:</strong></div>
                    <div class="w3-col s8"><?= esc($missatge['correu']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($missatge['id']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

        <div class="pagination-container">
            <?= $pager->links() ?>
        </div>

<?php echo $this->endSection(); ?>