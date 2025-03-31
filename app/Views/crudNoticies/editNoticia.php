<?php echo $this->extend('plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container">

<h2>EDITAR NOTICIA</h2>

    <div class="w3-padding">
        <form action="<?= base_url('updateNoticia/'.$noticia['id']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">

            <label for="nom" class="w3-text-dark-grey">Nom</label>
            <input type="text" id="nombre" name="nom" class="w3-input w3-border w3-round" value="<?= esc($noticia['nom']) ?>" required>
            
            <label for="contingut" class="w3-text-dark-grey w3-margin-top">Contingut</label>
            <textarea id="contingut" name="contingut" class="w3-input w3-border w3-round" rows="4" required><?= esc($noticia['contingut']) ?></textarea>

            <div class="w3-margin-top">
                <button type="submit" class="w3-button w3-blue w3-round">Enviar</button>
            </div>

        </form>
    </div>

</div>

<?php echo $this->endSection(); ?>