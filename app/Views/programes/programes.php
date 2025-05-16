<?php echo $this->extend('layouts/plantilla'); ?>

<?php echo $this->section('contingut'); ?>

<div class="w3-container" style="margin-top: 20px;">

    <h2 class="w3-center">Fitxes de equips</h2>

    <!-- DIVS AMB CLASSIFICACIONS -->
    <div class="w3-row-padding">
        <?php foreach($classifications as $classification): ?>

            <div class="w3-third w3-margin-bottom">
                <div class="w3-card w3-padding w3-white">
                    <h3><?= esc($classification['competitionName'])?></h3>
                    <div class="w3-center">
                        <a href="<?= base_url('programes/viewClassification/' . esc($classification['id'])) ?>">
                            <?php if (!empty($classification['imagen_path'])): ?>
                                <img src="<?= base_url($classification['imagen_path']) ?>" alt="Imatge de la notícia" class="w3-image" style="max-width:400px;max-height:200px;margin-bottom:5%">
                            <?php else: ?>
                                <img style="max-width:400px;max-height:200px;margin-bottom:5%" class="imgNoticia" src="<?= base_url('img/alpicat.png') ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        
    </div>

</div>
    
<?php echo $this->endSection(); ?>