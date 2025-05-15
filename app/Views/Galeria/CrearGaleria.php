<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <h2>GESTIÓ DE GALERIES</h2>

    <!-- PANEL SUPERIOR: CREAR, BUSCAR, PAPERERA -->
    <div class="w3-container w3-padding-16" style="display: flex; justify-content: space-between; align-items: center;">
    <form action="<?= base_url('admin/crearGaleria') ?>" method="post" enctype="multipart/form-data" class="w3-card-4 w3-padding w3-round w3-light-grey">
        
        <label for="nom_galeria" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="nom_galeria" name="nom_galeria" class="w3-input w3-border w3-round" required>

        <label for="descripcio_galeria" class="w3-text-dark-grey w3-margin-top">Descripció</label>
        <textarea id="descripcio_galeria" name="descripcio_galeria" class="w3-input w3-border w3-round" rows="4"></textarea>

        <label for="imatge_galeria" class="w3-text-dark-grey w3-margin-top">Pujar imatge</label>
        <input type="file" id="imatge_galeria" name="imatge_galeria" accept="image/*" class="w3-input w3-border w3-round">

        <div class="w3-margin-top">
            <button type="submit" class="w3-button w3-blue w3-round">CREAR GALERIA</button>
        </div>
    </form>
        <!-- BOTÓN CREAR GALERIA -->
        <button class="w3-button w3-round custom-button">
            <a href="<?= base_url('/admin/crearGaleria') ?>"><i class="fa fa-plus"></i><span> Crear Galeria</span></a>
        </button>

        <!-- FORMULARI DE BUSQUEDA -->
        <form action="<?= base_url('/admin/searchGaleriaCrud') ?>" method="GET" style="flex-grow: 1; display: flex; justify-content: center;">
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

        <!-- BOTÓN PAPERERA -->
        
        
    </div>

    <!-- TAULA DE GALERIES -->
    <table class="w3-table w3-bordered w3-striped w3-hoverable">
        <thead>
            <tr class="w3-light-grey">
                <th>ID</th>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Imatge</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($galeries) && is_array($galeries)): ?>
                <?php foreach($galeries as $galeria): ?>
                    <tr>
                        <td><?= esc($galeria['id_galeria']) ?></td>
                        <td><?= esc($galeria['nom_galeria']) ?></td>
                        <td><?= character_limiter($galeria['descripcio_galeria'], 40) ?></td>
                        <td>
                            <img src="<?= base_url('uploads/' . esc($galeria['imatge_galeria'])) ?>" alt="" style="width: 100px;">
                        </td>
                        <td>
                            <a href="<?= base_url('galeria/readGaleria/' . esc($galeria['id_galeria'])) ?>" class="w3-button w3-blue">Veure</a>
                            <a href="<?= base_url('/admin/editGaleria/' . esc($galeria['id_galeria'])) ?>" class="w3-button w3-yellow">Editar</a>
                            <a href="<?= base_url('/admin/deleteGaleria/' . esc($galeria['id_galeria'])) ?>" class="w3-button w3-red">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hi ha galeries disponibles.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Paginació -->
    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>
