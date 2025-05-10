<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <h2>GESTIONAR NOTÍCIES</h2>

    <!-- BUSCADOR DE NOTICIES CRUD -->
    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- CREAR NOTICIES -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/noticies/crearNoticia') ?>"><i class="fa fa-plus"></i><span> Crear Noticia</span></a>
        </button>

        <!-- BUSCAR NOTICIES -->
        <form action="<?= base_url('/admin/noticies/searchNoticiaCrud') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
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

        <!-- PAPELERA -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/noticies/papeleraNoticies') ?>"><i class="fa fa-trash"></i><span> Papelera</span></a>
        </button>
        
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
        <thead>
            <tr class="w3-light-grey">
                <th>Titol</th>
                <th>Contingut</th>
                <th>URL</th>
                <th>Data publicacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($noticies as $noticia): ?>
            <tr>
                <td><?= character_limiter($noticia['nom'], 20) ?></td>
                <td><?= character_limiter($noticia['contingut'], 30) ?></td>
                <td><?= esc($noticia['url'])?></td>
                <td><?= esc($noticia['created_at'])?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($noticia['id']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('/admin/noticies/editNoticia/' . esc($noticia['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('/admin/noticies/deleteNoticia/' . esc($noticia['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($noticies as $noticia): ?>
    <div id="modal-<?= esc($noticia['id']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($noticia['id']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de la notícia</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($noticia['id']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Titol:</strong></div>
                    <div class="w3-col s8"><?= esc($noticia['nom']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Contingut:</strong></div>
                    <div class="w3-col s8"><?= esc($noticia['contingut']) ?></div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>URL:</strong></div>
                    <div class="w3-col s8"><a href="<?= esc($noticia['url']) ?>"><?= esc($noticia['url']) ?></a></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($noticia['created_at']) ?></div>
                </div>
                
                <?php if(isset($noticia['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($noticia['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($noticia['id']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>