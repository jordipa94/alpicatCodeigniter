<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <h2>CREAR ESDEVENIMENT</h2>

    <!-- BUSCADOR DE ESDEVENIMENTS CRUD -->
    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- CREAR ESDEVENIMENT -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin//calendario/addEvent') ?>"><i class="fa fa-plus"></i><span> Crear Esdeveniment</span></a>
        </button>

        <!-- BUSCAR ESDEVENIMENTS -->
        <form action="<?= base_url('/admin/calendario/searchEventCrud') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
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
            <a href="<?php echo base_url('/admin/calendario/papeleraEvent') ?>"><i class="fa fa-trash"></i><span> Papelera</span></a>
        </button>
        
    </div>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Inici</th>
                <th>Final</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($eventos as $evento): ?>
            <tr>
                <td><?= esc($evento['id_evento']) ?></td>
                <td><?= character_limiter($evento['titulo'], 20) ?></td>
                <td><?= character_limiter($evento['descripcion'], 40) ?></td>
                <td><?= esc($evento['fecha_inicio']) ?></td>
                <td><?= esc($evento['fecha_fin']) ?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($evento['id_evento']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <a href="<?= base_url('/admin/calendario/editEvent/' . esc($evento['id_evento'])) ?>" class="w3-button w3-yellow">Editar</a>
                    <a href="<?= base_url('/admin/calendario/deleteEvent/' . esc($evento['id_evento'])) ?>" class="w3-button w3-red">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($eventos as $evento): ?>
    <div id="modal-<?= esc($evento['id_evento']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($evento['id_evento']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de l'event</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['id_evento']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Titol event:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['titulo']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Descripcio event:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['descripcion']) ?></div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Fecha d'inici del event:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['fecha_inicio']) ?></div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Fecha final del event:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['fecha_fin']) ?></div>
                </div>

                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Color al calendari:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['color']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['created_at']) ?></div>
                </div>
                
                <?php if(isset($evento['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($evento['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($evento['id_evento']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>