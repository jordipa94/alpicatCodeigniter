<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h1>GESTIONAR CONFIGURACIO</h1>

    <!-- BUSCADOR DE CONFIGURACIONS -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/admin/searchConfig') ?>" method="GET" class="w3-center">
            <?= csrf_field(); ?>
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar data de configuracio..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-round custom-button"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>Clau</th>
                <th>Valor</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($configs as $config): ?>
            <tr>
                <td><?= esc($config['clau'])?></td>
                <td><?= substr($config['valor'], 0, 40) . '...' ?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($config['id']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/editConfig/' . esc($config['id'])) ?>">Editar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($configs as $config): ?>
    <div id="modal-<?= esc($config['id']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($config['id']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de la Configuració</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($config['id']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Clau:</strong></div>
                    <div class="w3-col s8"><?= esc($config['clau']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Valor:</strong></div>
                    <div class="w3-col s8"><?= esc($config['valor']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($config['created_at']) ?></div>
                </div>
                
                <?php if(isset($config['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($config['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($config['id']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>