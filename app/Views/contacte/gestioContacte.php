<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

    <div class="w3-padding">

    <h1>Gestio de Contacte</h1>
    
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
                <th>ID</th>
                <th>Concepte</th>
                <th>Missatge</th>
                <th>Telefono</th>
                <th>Correu</th>
                <th>Categoria</th>
                <th>Data de creacio</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($missatges as $missatge): ?>
            <tr>
                <td><?= esc($missatge['id'])?></td>
                <td><?= substr($missatge['concepte'], 0, 20) . '...' ?></td>
                <td><?= substr($missatge['missatge'], 0, 40) . '...' ?></td>
                <td><?= esc($missatge['telefono'])?></td>
                <td><?= esc($missatge['correu'])?></td>
                <td><?= esc($missatge['categoria'])?></td>
                <td><?= esc($missatge['created_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('admin/gestionarContacte/readContactForm/' . esc($missatge['id'])) ?>">Veure</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        <div class="pagination-container">
            <?= $pager->links() ?>
        </div>

    </div>

<?php echo $this->endSection(); ?>