<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

    <button class="w3-button w3-round custom-button w3-margin-top"><a href="<?= base_url('/admin/noticies/llistatNoticies') ?>">Tornar a inici</a></button>

    <h2>CREAR NOTÍCIA</h2>

    <!-- FORMULARI PER CREAR UNA NOVA NOTICIA -->
    <form action="crearNoticia" method="post" enctype="multipart/form-data" class="w3-card-4 w3-padding w3-round w3-light-grey">

        <?= csrf_field(); ?>
        
        <label for="nom" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="nombre" name="nom" class="w3-input w3-border w3-round" required>

        <label for="contingut" class="w3-text-dark-grey w3-margin-top">Contingut</label>
        <textarea id="contingut" name="contingut" class="w3-input w3-border w3-round" rows="4" required></textarea>

        <label for="categoria" class="w3-text-black">CATEGORIA</label>
        <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom">
            <option value="" disabled selected>Selecciona una opció</option>
            <?php foreach($categories as $categoria): ?>
                <option value="<?= esc($categoria['name']) ?>"><?= esc($categoria['name']) ?></option>
            <?php endforeach; ?>
        </select>

        <!-- CAMP PER PUJAR LA IMATGE -->
        <label for="imatge" class="w3-text-dark-grey">Imatge</label>
        <input type="file" id="imatge" name="imatge" class="w3-input w3-border w3-round" accept="image/*">

        <div class="w3-margin-top">
            <button type="submit" class="w3-button w3-round custom-button w3-margin-top">CREAR NOTICIA</button>
        </div>
    </form>

<?php echo $this->endSection(); ?>