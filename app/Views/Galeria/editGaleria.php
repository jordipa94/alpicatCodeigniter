<?= $this->extend('layouts/dashboard'); ?>

<?= $this->section('contingut'); ?>

<div class="w3-container">
    <button class="w3-button w3-round custom-button w3-margin-top">
        <a href="<?= base_url('/admin/galeria/viewLlistatGaleria') ?>">Tornar a inici</a>
    </button>

    <h2>EDITAR GALERIA</h2>

    <form action="<?= base_url('admin/galeria/updateGaleria/' . $galeria['id_galeria']) ?>" 
          method="post" enctype="multipart/form-data" class="w3-card-4 w3-padding w3-round w3-light-grey">
          
        <label for="nom_galeria" class="w3-text-dark-grey">Nom</label>
        <input type="text" id="nom_galeria" name="nom_galeria" 
               class="w3-input w3-border w3-round" value="<?= esc($galeria['nom_galeria']) ?>" required>
        
        <label for="descripcio_galeria" class="w3-text-dark-grey w3-margin-top">Descripció</label>
        <textarea id="descripcio_galeria" name="descripcio_galeria" 
                  class="w3-input w3-border w3-round" rows="4"><?= esc($galeria['descripcio_galeria']) ?></textarea>

        <label for="categoria" class="w3-text-black">CATEGORIA</label>
        <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom">
            <option value="" disabled>Selecciona una opció</option>
            <?php foreach ($categories as $categoria): ?>
                <option value="<?= esc($categoria['name']) ?>" 
                    <?= ($categoria['name'] == $galeria['categoria']) ? 'selected' : '' ?>>
                    <?= esc($categoria['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <h3>Imatges Actuals</h3>
        <div class="w3-margin-bottom">
            <?php if (!empty($imagenes)): ?>
                <?php foreach ($imagenes as $imagen): ?>
                    <div class="w3-margin-bottom">
                        <img src="<?= base_url($imagen['imagen_path']) ?>" alt="Imatge" style="width: 100px;">
                        <label>
                            <input type="checkbox" name="imagenesEliminar[]" value="<?= $imagen['id_imagen'] ?>">
                            Eliminar
                        </label>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hi ha imatges.</p>
            <?php endif; ?>
        </div>

        <h3>Pujar Noves Imatges</h3>
        <input type="file" name="imatge_galeria[]" multiple class="w3-input w3-border w3-round w3-margin-bottom">

        <button class="w3-button w3-round custom-button w3-margin-bottom" type="submit">Guardar Canvis</button>
    </form>
</div>

<?= $this->endSection(); ?>