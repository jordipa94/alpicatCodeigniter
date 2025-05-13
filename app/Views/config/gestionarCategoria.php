<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <h2>GESTIONAR CATEGORIES</h2>

    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">

        <!-- CREAR CATEGORIES -->
        <button onclick="document.getElementById('modal-crear-categoria').style.display='block'" class="w3-button w3-round custom-button">
            <i class="fa fa-plus"></i><span> Crear Categoria</span>
        </button>

        <!-- BUSCADOR DE CATEGORIES -->
        <form action="<?= base_url('/admin/searchCategoria') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
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

        <!-- PAPELERA CATEGORIES -->
        <button class="w3-button w3-round custom-button">
            <a href="<?php echo base_url('/admin/papeleraCategories') ?>"><i class="fa fa-trash"></i><span> Papelera</span></a>
        </button>

    </div>

    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>Nom</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $categoria): ?>
            <tr>
                <td><?= esc($categoria['name'])?></td>
                <td>
                    <button onclick="document.getElementById('modal-<?= esc($categoria['id']) ?>').style.display='block'" class="w3-button w3-gray">Veure</button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/editCategoria/' . esc($categoria['id'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('admin/deleteCategoria/' . esc($categoria['id'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <?php foreach($categories as $categoria): ?>
    <div id="modal-<?= esc($categoria['id']) ?>" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-<?= esc($categoria['id']) ?>').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Detalls de la Categoria</h3>
            </div>
            
            <div class="w3-container w3-padding" style="max-height: 70vh; overflow-y: auto; word-wrap: break-word; overflow-wrap: break-word;">
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>ID:</strong></div>
                    <div class="w3-col s8"><?= esc($categoria['id']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Nom:</strong></div>
                    <div class="w3-col s8"><?= esc($categoria['name']) ?></div>
                </div>
                
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Data Creació:</strong></div>
                    <div class="w3-col s8"><?= esc($categoria['created_at']) ?></div>
                </div>
                
                <?php if(isset($categoria['updated_at'])): ?>
                <div class="w3-row w3-section">
                    <div class="w3-col s4"><strong>Última Actualització:</strong></div>
                    <div class="w3-col s8"><?= esc($categoria['updated_at']) ?></div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-<?= esc($categoria['id']) ?>').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- MODAL CREAR CATEGORIA -->
    <div id="modal-crear-categoria" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <div class="w3-center">
                <span onclick="document.getElementById('modal-crear-categoria').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                <h3>Crear Nova Categoria</h3>
            </div>

            <div class="w3-container w3-padding">
                <form action="crearCategoria" method="post" class="w3-padding w3-round w3-light-grey">
                    <?= csrf_field(); ?>
                    
                    <label for="name" class="w3-text-dark-grey">Nom</label>
                    <input type="text" id="name" name="name" class="w3-input w3-border w3-round" required>

                    <div class="w3-margin-top">
                        <button type="submit" class="w3-button w3-green w3-round">CREAR CATEGORIA</button>
                    </div>
                </form>
            </div>

            <div class="w3-container w3-light-grey w3-padding">
                <button onclick="document.getElementById('modal-crear-categoria').style.display='none'" 
                    class="w3-button w3-gray">Tancar</button>
            </div>
        </div>
    </div>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>