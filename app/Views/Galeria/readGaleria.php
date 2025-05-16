<?= $this->extend('layouts/plantilla'); ?>

<?= $this->section('contingut'); ?>

<div class="w3-container">
    <button class="w3-button w3-round custom-button w3-margin-top">
        <a style="text-decoration:none;" href="<?= base_url('/galeria') ?>">Tornar a inici</a>
    </button>

    <h2 class="w3-text-blue">Galeria: <?= esc($galeria['nom_galeria']) ?></h2>

    <div class="w3-card-4 w3-round w3-light-grey w3-padding">
        <h3 class="w3-text-dark-grey"><?= esc($galeria['nom_galeria']) ?></h3>
        <p class="w3-text-dark-grey"><?= esc($galeria['descripcio_galeria']) ?></p>

        <?php if (!empty($imagenes)): ?>
            <div class="w3-row-padding w3-margin-top">
                <?php foreach ($imagenes as $imagen): ?>
                    <div class="w3-col s6 m4 l3 w3-margin-bottom w3-hover-opacity">
                        <div class="w3-card w3-round w3-hover-shadow">
                            <img onclick="document.getElementById('modal-<?= $imagen['id_imagen'] ?>').style.display='block'" 
                                 src="<?= base_url($imagen['imagen_path']) ?>" 
                                 alt="Imatge galeria" 
                                 style="width:100%; height:200px; object-fit:cover; cursor:pointer;">
                        </div>
                    </div>

                    <!-- Modal zoom imatge -->
                    <div id="modal-<?= $imagen['id_imagen'] ?>" class="w3-modal" style="display:none;">
                        <div class="w3-modal-content w3-animate-zoom w3-center w3-padding-large">
                            <span onclick="document.getElementById('modal-<?= $imagen['id_imagen'] ?>').style.display='none'" 
                                  class="w3-button w3-hover-red w3-display-topright">&times;</span>
                            <img src="<?= base_url($imagen['imagen_path']) ?>" 
                                 alt="Imatge galeria" 
                                 style="max-width:90%; max-height:90%;">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="w3-text-dark-grey">No hi ha imatges disponibles per aquesta galeria.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>