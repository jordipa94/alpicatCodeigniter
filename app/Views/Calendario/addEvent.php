<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

<div class="w3-padding">

    <h1>Crear Esdeveniment</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="w3-panel w3-red w3-padding w3-round w3-margin-bottom">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <!-- FORMULARI PER CREAR UN NOU ESDEVENIMENT -->
    <form action="<?= base_url('calendario/addEvent') ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">
        
        <label for="titulo" class="w3-text-dark-grey">Títol</label>
        <input type="text" id="titulo" name="titulo" class="w3-input w3-border w3-round" required>

        <label for="descripcion" class="w3-text-dark-grey w3-margin-top">Descripció</label>
        <textarea id="descripcion" name="descripcion" class="w3-input w3-border w3-round" rows="4"></textarea>

        <label for="fecha_inicio" class="w3-text-dark-grey w3-margin-top">Data Inici</label>
        <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="w3-input w3-border w3-round" required>

        <label for="fecha_fin" class="w3-text-dark-grey w3-margin-top">Data Final</label>
        <input type="datetime-local" id="fecha_fin" name="fecha_fin" class="w3-input w3-border w3-round" required>

        <label for="color" class="w3-text-dark-grey w3-margin-top">Color</label>
        <input type="color" id="color" name="color" class="w3-input w3-border w3-round" value="#3a87ad">

        <div class="w3-margin-top">
            <button type="submit" class="w3-button w3-blue w3-round">CREAR ESDEVENIMENT</button>
        </div>
    </form>

    <!-- BUSCADOR DE ESDEVENIMENTS -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/calendario/searchEventoCrud') ?>" method="GET" class="w3-center">
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar esdeveniments..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-blue w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="w3-table w3-bordered w3-striped w3-card-4">
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
                    <a href="<?= base_url('calendario/editEvent/' . esc($evento['id_evento'])) ?>" class="w3-button w3-yellow">Editar</a>
                    <a href="<?= base_url('calendario/deleteEvent/' . esc($evento['id_evento'])) ?>" class="w3-button w3-red">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
           

</div>

<?php echo $this->endSection(); ?>
