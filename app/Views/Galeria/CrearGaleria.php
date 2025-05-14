<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

<div class="w3-padding">

    <h1>Crear Galeria</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="w3-panel w3-green w3-padding w3-round w3-margin-bottom">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="w3-panel w3-red w3-padding w3-round w3-margin-bottom">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <!-- FORMULARIO PARA CREAR UNA NUEVA GALERIA -->
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


    <!-- BUSCADOR DE GALERIES -->
    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('/admin/searchGaleriaCrud') ?>" method="GET">
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar galeries..." class="w3-input w3-border w3-round">
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
                <th>Nom</th>
                <th>Descripció</th>
                <th>Imatge</th>
                <th>Data creació</th>
                <th>Opcions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($galeries as $galeria): ?>
            <tr>
                <td><?= esc($galeria['id_galeria'])?></td>
                <td><?= character_limiter($galeria['nom_galeria'], 20) ?></td>
                <td><?= character_limiter($galeria['descripcio_galeria'], 40) ?></td>
                <td><?= esc($galeria['imatge_galeria'])?></td>
                <td><?= esc($galeria['created_at'])?></td>
                <td>
                    <button class="w3-button w3-gray"><a href="<?= base_url('galeria/readGaleria/' . esc($galeria['id_galeria'])) ?>">Veure</a></button>
                    <button class="w3-button w3-yellow"><a href="<?= base_url('admin/editGaleria/' . esc($galeria['id_galeria'])) ?>">Editar</a></button>
                    <button class="w3-button w3-red"><a href="<?= base_url('admin/deleteGaleria/' . esc($galeria['id_galeria'])) ?>">Eliminar</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <?= $pager->links() ?>
    </div>

</div>

<?= $this->endSection(); ?>
