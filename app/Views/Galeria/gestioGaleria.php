<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <h2>GESTIÓ DE GALERIES</h2>

    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- BOTÓN CREAR GALERIA -->
        <button class="w3-button w3-round custom-button">
            <a href="<?= base_url('/admin/galeria/crearGaleria') ?>"><i class="fa fa-plus"></i><span> Crear Galeria</span></a>
        </button>

        <!-- FORMULARI DE BUSQUEDA -->
        <form action="<?= base_url('/admin/galeria/searchGaleriaCrud') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
            <div class="w3-row" style="max-width: 400px; width: 80%;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" placeholder="Buscar..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-round custom-button">
                        <i class="fa fa-search"></i><span> Buscar</span>
                    </button>
                </div>
            </div>
        </form>

        <!-- PAPELERA GALERIES -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/galeria/papeleraGaleria') ?>"><i class="fa fa-trash"></i><span> Papelera</span></a>
        </button>
        
    </div>

    <!-- TAULA DE GALERIES -->
    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom galeria</th>
                <th>Descripcio galeria</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($galeries as $galeria): ?>
            <tr>
                <td><?= character_limiter($galeria['nom_galeria'], 20) ?></td>
                <td><?= character_limiter($galeria['descripcio_galeria'], 50) ?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($galeria['id_galeria']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('/admin/galeria/editGaleria/' . esc($galeria['id_galeria'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('/admin/galeria/deleteGaleria/' . esc($galeria['id_galeria'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        <!-- Modal -->
    <?php foreach($galeries as $galeria): ?>
    <div id="modal-<?= esc($galeria['id_galeria']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($galeria['id_galeria']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de l'usuari</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($galeria['id_galeria']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Nom de usuari:</strong></div>
                    <div class="w3-col s8"><?= esc($galeria['nom_galeria']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Valor:</strong></div>
                    <div class="w3-col s8"><?= esc($galeria['descripcio_galeria']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($galeria['created_at']) ?></div>
                </div>
                
                <?php if(isset($user['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($galeria['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($galeria['id_galeria']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Paginació -->
    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>