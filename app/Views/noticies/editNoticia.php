<?php echo $this->extend('layouts/dashboard'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

    <button class="w3-button w3-round custom-button w3-margin-top">
        <a href="<?= base_url('/admin/noticies/llistatNoticies') ?>">Tornar a inici</a>
    </button>

    <h2>EDITAR NOTICIA</h2>

    <div class="w3-padding">
        <form action="<?= base_url('admin/noticies/updateNoticia/'.$noticia['id']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey" enctype="multipart/form-data">

            <?= csrf_field(); ?>

            <label for="nom" class="w3-text-dark-grey">Nom</label>
            <input type="text" id="nombre" name="nom" class="w3-input w3-border w3-round" value="<?= esc($noticia['nom']) ?>" required>
            
            <label for="contingut" class="w3-text-dark-grey w3-margin-top">Contingut</label>
            <textarea id="contingut" name="contingut" class="w3-input w3-border w3-round" rows="4" required><?= esc($noticia['contingut']) ?></textarea>

            <!-- Dropdown Categoria -->
            <label for="categoria" class="w3-text-black">CATEGORIA</label>
            <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom">
                <option value="" disabled>Selecciona una opció</option>
                <?php foreach($categories as $categoria): ?>
                    <option value="<?= esc($categoria['name']) ?>" 
                        <?= (isset($noticia['categoria']) && $noticia['categoria'] == $categoria['name']) ? 'selected' : '' ?>>
                        <?= esc($categoria['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Imatge actual -->
            <?php if (!empty($noticia['imagen_path'])): ?>
                <div class="w3-margin-top">
                    <label class="w3-text-dark-grey">Imatge actual:</label>
                    <img src="<?= base_url($noticia['imagen_path']) ?>" alt="Imatge de la notícia" style="max-width:200px;">
                </div>
            <?php endif; ?>

            <!-- Nova Imatge -->
            <label for="imatge" class="w3-text-dark-grey w3-margin-top">Actualitzar Imatge (opcional)</label>
            <input type="file" id="imatge" name="imatge" class="w3-input w3-border w3-round">

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-round custom-button w3-margin-top">Enviar</button>
            </div>

        </form>
    </div>

</div>

<?php echo $this->endSection(); ?>