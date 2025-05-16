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
                    <a href="<?= base_url('/admin/calendario/editEvent/' . esc($evento['id_evento'])) ?>" class="w3-button w3-yellow">Editar</a>
                    <a href="<?= base_url('/admin/calendario/deleteEvent/' . esc($evento['id_evento'])) ?>" class="w3-button w3-red">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>